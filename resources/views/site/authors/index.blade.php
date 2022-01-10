@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card m-3">
                <div class="card-header">
                    <h3 class="card-title">Autorzy</h3>
                    <div class="card-tools">
                        <a href="{{ route("authors.create") }}" class="btn btn-success">
                            <i class="fas fa-plus mr-1"></i> Dodaj autora
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
    <script>
        const authorsTable = document.querySelector("#authorsTableTbody");
        const authors = {
            deleteById : function(authorId) {
                window.axios.delete(`api/authors/destroy/${authorId}`)
                    .then(res => {
                    }).catch(err => {
                        console.log(err)
                    })
            },
            refreshAuthorsList : function(){
                window.axios.get('api/authors')
                    .then(res => {
                        document.querySelector("#authorsTableTbody").innerHTML = "";
                        console.log('cleared');
                        console.log(document.querySelector("#authorsTableTbody").innerHTML);
                        authorsList = res.data;
                        if ( Array.isArray(authorsList) ) {
                            authorsList.forEach(author => {
                                addTableRow(author);
                            });
                        } else {
                            Object.keys(authorsList).forEach(key => {
                                addTableRow(authorsList[key]);
                            });
                        }
                    });
            },
        }

        document.addEventListener('DOMContentLoaded', () => {
            window.axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            };
        });

        function deleteAuthorPopup (id, surname, name) {
            if (confirm("Czy na pewno chcesz usunąć autora " + surname + " " + name + "?")) {
                authors.deleteById(id);
                authors.refreshAuthorsList();
            }
        }

        function addTableRow(author){
            console.log('adding');
            let newRow = authorsTable.insertRow(-1);
            let surnameCell = newRow.insertCell(0);
            let surname = document.createTextNode(author.surname);
            let nameCell = newRow.insertCell(1);
            let name = document.createTextNode(author.name);
            let actionsCell = newRow.insertCell(2);
            let actions = document.createRange().createContextualFragment(`
                <div class="d-flex justify-content-end">
                    <a class="btn btn-app" href="/authors/` + author.id + `/edit">
                        <i class="fas fa-edit"></i> Edytuj
                    </a>
                    <a class="btn btn-app" onclick="deleteAuthorPopup(` + author.id +`,'`+ author.surname +`','`+ author.name + `')">
                        <i class="fas fa-trash-alt"></i> Usuń
                    </a>
                </div>`);

            surnameCell.appendChild(surname);
            nameCell.appendChild(name);
            actionsCell.appendChild(actions);
        }
    </script>
@endsection
