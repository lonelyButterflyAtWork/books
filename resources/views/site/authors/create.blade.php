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
                <form action="{{ route('authors.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Imię*</label>
                            <input type="text" class="form-control" name="name" placeholder="Wpisz imię" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nazwisko*</label>
                            <input type="text" class="form-control" name="surname" placeholder="Wpisz nazwisko" required>
                        </div>
                    </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                  </div>
                </form>
              </div>
        </div>
    </div>
@endsection
