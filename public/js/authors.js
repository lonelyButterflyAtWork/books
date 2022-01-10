const authorsTable = document.querySelector("#authorsTableTbody");
const authors = {
    deleteById: function (authorId) {
        window.axios.delete(`api/authors/destroy/${authorId}`)
            .then(res => {
            }).catch(err => {
                console.log(err)
            })
    },
    refreshAuthorsList: function () {
        window.axios.get('api/authors')
            .then(res => {
                authorsTable.innerHTML = "";
                authorsList = res.data;
                if (Array.isArray(authorsList)) {
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
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };
});

function deleteAuthorPopup(id, surname, name) {
    if (confirm("Czy na pewno chcesz usunąć autora " + surname + " " + name + "?")) {
        authors.deleteById(id);
        authors.refreshAuthorsList();
    }
}

function addTableRow(author) {
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
            <a class="btn btn-app" onclick="deleteAuthorPopup(` + author.id + `,'` + author.surname + `','` + author.name + `')">
                <i class="fas fa-trash-alt"></i> Usuń
            </a>
        </div>`);

    surnameCell.appendChild(surname);
    nameCell.appendChild(name);
    actionsCell.appendChild(actions);
}
