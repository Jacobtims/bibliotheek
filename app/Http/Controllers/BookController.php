<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genre'])->paginate(10);

        return view('pages.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();

        return view('pages.books.create', compact('authors', 'genres'));
    }

    public function store(StoreBookRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('books.index')->with('success', 'Boek succesvol aangemaakt!');
    }

    public function edit(Book $book)
    {
        //
    }

    public function update(Request $request, Book $book)
    {
        //
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return back()->with('success', 'Boek succesvol verwijderd!');
    }
}
