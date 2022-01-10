@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card m-3">
                <div class="card-header">
                    <h3 class="card-title">Autorzy</h3>
                    <div class="card-tools">
                        <a href="{{ route("books.create") }}" class="btn btn-success">
                            <i class="fas fa-plus mr-1"></i> Dodaj
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id = "booksTable">
                        <thead>
                            <tr>
                                <th>Tytuł</th>
                                <th>Autor</th>
                                <th>ISBN</th>
                                <th>Wydawnictwo</th>
                                <th>Rok wydania</th>
                            </tr>
                        </thead>
                        <tbody id = "booksTableTbody">
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->title ?? '' }}</td>
                                    <td>{{ ($book->author->surname . " " . $book->author->name) ?? ''}}</td>
                                    <td>{{ $book->isbn ?? '' }}</td>
                                    <td>{{ $book->publisher->name ?? '' }}</td>
                                    <td>{{ $book->publication_year ?? '' }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-app" href="{{ route("books.edit", $book) }}">
                                                <i class="fas fa-edit"></i> Edytuj
                                            </a>
                                            <a class="btn btn-app" onclick="deletebookPopup({{ $book->id }}, '{{ $book->surname }}', '{{ $book->name }}')">
                                                <i class="fas fa-trash-alt"></i> Usuń
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/books.js') }}"></script>
@endsection
