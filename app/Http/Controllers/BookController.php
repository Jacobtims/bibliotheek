<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\LentBook;
use App\Models\ReservedBook;
use Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => ['nullable', 'string'],
            'author_id' => ['nullable', 'exists:authors,id'],
            'genre_id' => ['nullable', 'exists:genres,id'],
            'availability' => ['nullable', 'array', 'in:available,reserved,lent']
        ]);

        $authors = Author::all();
        $genres = Genre::all();

        // Build books query
        $query = Book::query();
        $query->with(['author', 'genre']);

        if ($request->filled('author_id')) {
            $query->whereAuthorId($request->author_id);
        }

        if ($request->filled('genre_id')) {
            $query->whereAuthorId($request->genre_id);
        }

        $books = $query->search($request->search)->paginate()->withQueryString();

        return view('pages.books', compact('books', 'authors', 'genres'));
    }

    public function show(Book $book)
    {
        $book->load(['author', 'genre']);

        $copies = Book::whereIsbn($book->isbn)->get();

        return view('pages.book', compact('book', 'copies'));
    }

    public function reserve(Book $book)
    {
        ReservedBook::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id
        ]);

        return back()->with('success', 'Boek succesvol gereserveerd!');
    }

    public function cancelReservation(Book $book)
    {
        $reservedBook = ReservedBook::where(['user_id' => auth()->id(), 'book_id' => $book->id])->firstOrFail();
        $reservedBook->delete();

        return back()->with('success', 'Boek reservering succesvol geannuleerd!');
    }

    public function lentOut()
    {
        $lentBooks = LentBook::whereUserId(auth()->id())->with('book')->paginate();

        return view('pages.dashboard.lent-out', compact('lentBooks'));
    }

    public function extend(Book $book)
    {
        $lentBook = Auth::user()->lentBooks()->where('book_id', $book->id)->firstOrFail();

        // If book is 3 times extended
        if ($lentBook->times_extended >= 3) {
            return back()->with('error', 'Boek is al 3x verlengd!');
        }

        $lentBook->increment('times_extended', 1);

        return back()->with('success', 'Boek is succesvol verlengd!');
    }
}
