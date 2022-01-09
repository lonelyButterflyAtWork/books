<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all()->sortBy('surname');
        return view('site.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('site.authors.create');
    }

    public function store(AuthorRequest $authorRequest, Author $author)
    {
        $author = new Author();
        $author->name = strip_tags($authorRequest->get('name'));
        $author->surname = strip_tags($authorRequest->get('surname'));
        if ($author->save()) {
            return redirect()->route('authors')->with(['success' => true, 'message_type' => 'success', 'message' => "Pomyślnie zapisano autora"]);
        } else {
            return back()->with([ 'success' => false, 'message_type' => 'danger', 'message' => "Błąd podczas zapisu" ]);
        }
        return view('site.books.index');
    }

    public function show(Request $request, Author $book)
    {
        // $userIsOwner = false;
        // if( $application->contract_no != null){
        //     $user = Auth::user();
        //     $contracts = ESBInterfacesService::ClientContracts( $user );
        //     foreach( $contracts as $contract ){
        //         if( $contract['CONTRACT_NUMBER'] == $application->contract_no && $contract['USER_IS_OWNER'] ){
        //             $userIsOwner = true;
        //         }
        //     }
        // }
        // if ( $request->user()->cannot('show', $application) && !$userIsOwner && $application->user_id != Auth::user()->id ) {
        //     $showApplicationMessage = __('applications/applications.showApplicationMessage');
        //     return back()->with(['success' => false, 'message_type' => 'danger', 'message' => $showApplicationMessage ]);
        // }
        // return view('site.applications.show', compact('application'));
        return view('site.books.index');
    }

    public function edit(Author $book)
    {
        return view('site.books.index');
    }

    public function update(Request $request, Author $book)
    {
        return view('site.books.index');
    }

    public function destroy(Author $book)
    {
        return view('site.books.index');
    }
}
