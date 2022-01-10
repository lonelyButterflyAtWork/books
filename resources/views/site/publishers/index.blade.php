@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card m-3">
                <div class="card-header">
                    <h3 class="card-title">Wydawnictwa</h3>
                    <div class="card-tools">
                        <a href="{{ route("publishers.create") }}" class="btn btn-success">
                            <i class="fas fa-plus mr-1"></i> Dodaj
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id = "publishersTable">
                        <thead>
                            <tr>
                                <th>Nazwa</th>
                                <th>Rok założenia</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id = "publishersTableTbody">
                            @foreach ($publishers as $publisher)
                                <tr>
                                    <td>{{ $publisher->name ?? '' }}</td>
                                    <td>{{ $publisher->establishment_year ?? '' }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-app" href="{{ route("publishers.edit", $publisher) }}">
                                                <i class="fas fa-edit"></i> Edytuj
                                            </a>
                                            <a class="btn btn-app" onclick="deletePublisherPopup({{ $publisher->id }}, '{{ $publisher->name }}', '{{ $publisher->establishment_year }}')">
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
    <script type="text/javascript" src="{{ URL::asset('js/publishers.js') }}"></script>
@endsection
