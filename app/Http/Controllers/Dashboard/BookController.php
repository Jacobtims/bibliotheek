<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\LentBook;
use App\Models\LentBooks;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genre'])->paginate(10);

        return view('pages.dashboard.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();

        return view('pages.dashboard.books.create', compact('authors', 'genres'));
    }

    public function store(BookRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('dashboard.books.index')->with('success', 'Boek succesvol aangemaakt!');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();

        return view('pages.dashboard.books.edit', compact('authors', 'genres', 'book'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());

        return redirect()->route('dashboard.books.index')->with('success', 'Boek succesvol aangepast!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return back()->with('success', 'Boek succesvol verwijderd!');
    }

    public function lendOut()
    {
        $users = User::role('Lezer')->withWhereHas('reader')->get(['id', 'name']);
        $books = Book::get(['id', 'title']);

        return view('pages.dashboard.books.lend-out', compact('users', 'books'));
    }

    public function lendOutBook(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'book_id' => ['required', 'exists:books,id']
        ]);

        LentBook::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'lent_at' => now()
        ]);

        return redirect()->route('dashboard')->with('success', 'Boek succesvol uitgeleend!');
    }
}
