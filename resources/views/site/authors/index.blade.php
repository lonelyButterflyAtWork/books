@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card m-3">
                <div class="card-header">
                    <h3 class="card-title">Autorzy</h3>
                    <div class="card-tools">
                        <a href="{{ route("authors.create") }}" class="btn btn-success">
                            <i class="fas fa-plus mr-1"></i> Dodaj
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id = "authorsTable">
                        <thead>
                            <tr>
                                <th>Nazwisko</th>
                                <th>Imię</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id = "authorsTableTbody">
                            @foreach ($authors as $author)
                                <tr>
                                    <td>{{ $author->surname ?? '' }}</td>
                                    <td>{{ $author->name ?? '' }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-app" href="{{ route("authors.edit", $author) }}">
                                                <i class="fas fa-edit"></i> Edytuj
                                            </a>
                                            <a class="btn btn-app" onclick="deleteAuthorPopup({{ $author->id }}, '{{ $author->surname }}', '{{ $author->name }}')">
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
    <script type="text/javascript" src="{{ URL::asset('js/authors.js') }}"></script>
@endsection
