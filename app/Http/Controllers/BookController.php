<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Publisher;
use Exception;
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
        $books = Book::with('author')->with('publisher')->orderBy('title')->get();
        return response()->json($books);
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('site.books.create', compact('authors', 'publishers'));
    }

    public function store(BookRequest $bookRequest, Book $book)
    {
        try {
            $book = new Book();
            $book->title = strip_tags($bookRequest->get('title'));
            $book->isbn = str_replace("-", "", $bookRequest->get('isbn'));
            $book->publication_year = $bookRequest->get('publication_year');
            $book->author()->associate($bookRequest->get('author_id'));
            $book->publisher()->associate($bookRequest->get('publisher_id'));
            if ($book->save()) {
                return redirect()->route('books')->with([
                    'success' => true,
                    'message_type' => 'success',
                    'message' => "Pomyślnie zapisano książkę"
                ]);
            } else {
                return back()->with([
                    'success' => false,
                    'message_type' => 'danger',
                    'message' => "Błąd podczas zapisu"
                ]);
            }
            return view('site.books.index');
        } catch (Exception $exception) {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => "Błąd podczas zapisu"
            ]);
        }
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('site.books.edit', compact('authors', 'publishers', 'book'));
    }

    public function update(BookRequest $bookRequest, Book $book)
    {
        try {
            $book->title = strip_tags($bookRequest->get('title'));
            $book->isbn = str_replace("-", "", $bookRequest->get('isbn'));
            $book->publication_year = $bookRequest->get('publication_year');
            $book->author()->associate($bookRequest->get('author_id'));
            $book->publisher()->associate($bookRequest->get('publisher_id'));
            if ($book->save()) {
                return redirect()->route('books')->with([
                    'success' => true,
                    'message_type' => 'success',
                    'message' => "Pomyślnie zapisano książkę"
                ]);
            } else {
                return back()->with([
                    'success' => false,
                    'message_type' => 'danger',
                    'message' => "Błąd podczas zapisu"
                ]);
            }
            return view('site.books.index');
        } catch (Exception $exception) {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => "Błąd podczas zapisu"
            ]);
        }
    }

    public function destroy($authorId)
    {
        $author = Book::find($authorId);
        if (!empty($author)) {
            $author->delete();
        }
    }
}
