@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Dodaj autora</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('authors.update', $author) }}" method="POST">
                    @csrf
                    @include('site.authors.form')
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Zaktualizuj</button>
                  </div>
                </form>
              </div>
        </div>
    </div>
@endsection
