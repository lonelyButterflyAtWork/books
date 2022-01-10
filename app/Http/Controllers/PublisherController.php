<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;
use Exception;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all()->sortBy('name');
        return view('site.publishers.index', compact('publishers'));
    }

    public function indexApi()
    {
        $publishers = Publisher::all()->sortBy('name');
        return response()->json(json_decode($publishers));
    }

    public function create()
    {
        return view('site.publishers.create');
    }

    public function store(PublisherRequest $publisherRequest, Publisher $publisher)
    {
        try {
            $publisher = new Publisher();
            $publisher->name = strip_tags($publisherRequest->get('name'));
            $publisher->establishment_year = $publisherRequest->get('establishment_year');
            if ($publisher->save()) {
                return redirect()->route('publishers')->with([
                    'success' => true,
                    'message_type' => 'success',
                    'message' => "Pomyślnie zapisano wydawnictwo"
                ]);
            } else {
                return back()->with([
                    'success' => false,
                    'message_type' => 'danger',
                    'message' => "Błąd podczas zapisu"
                ]);
            }
            return view('site.publishers.index');
        } catch (Exception $exception) {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => "Błąd podczas zapisu"
            ]);
        }
    }

    public function edit(Publisher $publisher)
    {
        return view('site.publishers.edit', compact('publisher'));
    }

    public function update(PublisherRequest $publisherRequest, Publisher $publisher)
    {
        try {
            $publisher->name = strip_tags($publisherRequest->get('name'));
            $publisher->establishment_year = strip_tags($publisherRequest->get('establishment_year'));
            if ($publisher->save()) {
                return redirect()->route('publishers')->with([
                    'success' => true,
                    'message_type' => 'success',
                    'message' => "Pomyślnie zaktualizowano wydawnictwo"
                ]);
            } else {
                return back()->with([
                    'success' => false,
                    'message_type' => 'danger',
                    'message' => "Błąd podczas zapisu"
                ]);
            }
            return view('site.publishers.index');
        } catch (Exception $exception) {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => "Błąd podczas zapisu"
            ]);
        }
    }

    public function destroy($publisherId)
    {
        $publisher = Publisher::find($publisherId);
        if (!empty($publisher)) {
            $publisher->delete();
        }
    }
}
