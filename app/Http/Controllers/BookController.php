<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all()->sortBy('title');
        return view('site.books.index', compact('books'));
    }

    public function indexApi()
    {
        $books = Book::all()->sortBy('title');
        return response()->json(json_decode($books));
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('site.books.create', compact('authors', 'publishers'));
    }

    public function store(BookRequest $bookRequest, Book $author)
    {
        $author = new Book();
        $author->name = strip_tags($bookRequest->get('name'));
        $author->surname = strip_tags($bookRequest->get('surname'));
        if ($author->save()) {
            return redirect()->route('books')->with([
                'success' => true,
                'message_type' => 'success',
                'message' => "Pomyślnie zapisano autora"
            ]);
        } else {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => "Błąd podczas zapisu"
            ]);
        }
        return view('site.books.index');
    }

    public function edit(Book $author)
    {
        return view('site.books.edit', compact('author'));
    }

    public function update(BookRequest $bookRequest, Book $author)
    {
        $author->name = strip_tags($bookRequest->get('name'));
        $author->surname = strip_tags($bookRequest->get('surname'));
        if ($author->save()) {
            return redirect()->route('books')->with([
                'success' => true,
                'message_type' => 'success',
                'message' => "Pomyślnie zaktualizowano dane autora"
            ]);
        } else {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => "Błąd podczas zapisu"
            ]);
        }
        return view('site.books.index');
    }

    public function destroy($authorId)
    {
        $author = Book::find($authorId);
        if (!empty($author)) {
            $author->delete();
        }
    }
}
