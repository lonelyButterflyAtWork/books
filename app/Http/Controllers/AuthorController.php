<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use Exception;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all()->sortBy('surname');
        return view('site.authors.index', compact('authors'));
    }

    public function indexApi()
    {
        $authors = Author::all()->sortBy('surname')->toArray();
        return response()->json($authors);
    }

    public function create()
    {
        return view('site.authors.create');
    }

    public function store(AuthorRequest $authorRequest, Author $author)
    {
        try {
            $author = new Author();
            $author->name = strip_tags($authorRequest->get('name'));
            $author->surname = strip_tags($authorRequest->get('surname'));
            if ($author->save()) {
                return redirect()->route('authors')->with([
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
            return view('site.authors.index');
        } catch (Exception $exception) {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => "Błąd podczas zapisu"
            ]);
        }
    }

    public function edit(Author $author)
    {
        return view('site.authors.edit', compact('author'));
    }

    public function update(AuthorRequest $authorRequest, Author $author)
    {
        try {
            $author->name = strip_tags($authorRequest->get('name'));
            $author->surname = strip_tags($authorRequest->get('surname'));
            if ($author->save()) {
                return redirect()->route('authors')->with([
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
            return view('site.authors.index');
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
        $author = Author::find($authorId);
        if (!empty($author)) {
            $author->delete();
        }
    }
}
