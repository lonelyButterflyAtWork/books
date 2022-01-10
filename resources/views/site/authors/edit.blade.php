@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edytuj autora</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('authors.update', $author) }}" method="POST">
                    @csrf
                    @include('site.authors.form')
                    <!-- /.card-body -->
                    <div class="d-flex card-footer">
                        <div class="m-1">
                            <button type="submit" class="btn btn-primary">Zapisz</button>
                        </div>
                        <div class="m-1">
                            <a type="submit" href="{{route('authors')}}" class="btn btn-primary">Powrót do listy</a>
                        </div>
                    </div>
                </form>
              </div>
        </div>
    </div>
@endsection
