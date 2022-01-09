<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('site.books.index');
    }

    public function create()
    {
        return view('site.books.index');
    }

    public function store()
    {
        return view('site.books.index');
    }

    public function show(Request $request, Book $book)
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

    public function edit(Book $book)
    {
        return view('site.books.index');
    }

    public function update(Request $request, Book $book)
    {
        return view('site.books.index');
    }

    public function destroy(Book $book)
    {
        return view('site.books.index');
    }
}
