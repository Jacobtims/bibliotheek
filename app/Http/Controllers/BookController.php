<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
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

        $books = $query->search($request->search)->paginate();

        return view('pages.books', compact('books', 'authors', 'genres'));
    }
}
