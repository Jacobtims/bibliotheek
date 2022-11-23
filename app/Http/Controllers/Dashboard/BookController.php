<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\LentBook;
use App\Models\User;
use Carbon\Carbon;
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

    public function store(StoreBookRequest $request)
    {
        // Check whether a new author needs to be created
        if ($request->author_id === '0') {
            $author = Author::create(['name' => $request->author]);
        } else {
            $author = Author::findOrFail($request->author_id);
        }
        // Check whether a new genre needs to be created
        if ($request->genre_id === '0') {
            $genre = Genre::create(['name' => $request->genre]);
        } else {
            $genre = Genre::findOrFail($request->genre_id);
        }

        // Create book
        Book::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author_id' => $author->id,
            'genre_id' => $genre->id,
            'purchased_at' => $request->purchased_at,
            'image' => $request->image,
            'content' => $request->input('content'),
        ]);

        return redirect()->route('dashboard.books.index')->with('success', 'Boek succesvol aangemaakt!');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();

        return view('pages.dashboard.books.edit', compact('authors', 'genres', 'book'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        // Create book
        $book->update([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
            'purchased_at' => $request->purchased_at,
            'image' => $request->image,
            'content' => $request->input('content'),
        ]);

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

        $user = User::findOrFail($request->user_id);
        // Check if user has a subscription
        if (!$user->subscription()->exists()) {
            return back()->with('error', 'Deze lezer heeft geen abonnement!');
        }
        // Check if user lent max books
        $userLentBooksCount = $user->lentBooks->count();
        $userSubscriptionBooksCount = $user->subscription?->subscriptionPlan->books;
        if ($userLentBooksCount >= $userSubscriptionBooksCount) {
            return back()->with('error', 'Deze lezer heeft de maximale aantal van ' . $user->subscription->subscriptionPlan->books . ' boeken geleend!');
        }

        // Create lent book record
        LentBook::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'lent_at' => now()
        ]);

        return back()->with('success', 'Boek succesvol uitgeleend (' . $userLentBooksCount + 1 . '/' . $userSubscriptionBooksCount . ' boeken)');
    }

    public function extend()
    {
        $users = User::role('Lezer')->withWhereHas('reader')->get(['id', 'name']);
        $books = Book::get(['id', 'title'])->where('status', 'lent');

        return view('pages.dashboard.books.extend', compact('users', 'books'));
    }

    public function extendBook(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'book_id' => ['required', 'exists:books,id']
        ]);

        $lentBook = LentBook::whereUserId($request->user_id)->whereBookId($request->book_id)->whereNotNull('returned_at')->first();

        // If book isn't lend by this reader
        if (!$lentBook) {
            return back()->with('error', 'Deze lezer heeft dit boek niet uitgeleend!');
        }

        // Increment time extended
        $lentBook->increment('times_extended', 1);
        $date = Carbon::parse($lentBook->lent_until)->translatedFormat('d F Y');

        return back()->with('success', 'Boek succesvol verlengd t/m ' . $date . '!');
    }

    public function return()
    {
        $users = User::role('Lezer')->withWhereHas('reader')->get(['id', 'name']);
        $books = Book::get(['id', 'title'])->where('status', 'lent');

        return view('pages.dashboard.books.return', compact('users', 'books'));
    }

    public function returnBook(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'book_id' => ['required', 'exists:books,id']
        ]);

        $lentBook = LentBook::whereUserId($request->user_id)->whereBookId($request->book_id)->whereNull('returned_at')->first();

        // If book isn't lend by this reader
        if (!$lentBook) {
            return back()->with('error', 'Deze lezer heeft dit boek niet uitgeleend!');
        }

        $lentBook->update([
            'returned_at' => now()
        ]);

        return back()->with('success', 'Boek succesvol ingeleverd!');
    }
}
