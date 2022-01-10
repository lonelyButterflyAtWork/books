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
                authorsList.forEach(author => {
                    addTableRow(author);
                });
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

    let attributes = [
        author.surname,
        author.name,
    ];

    let newRow = authorsTable.insertRow(-1);

    for (let qty = 0; qty < attributes.length; qty++) {
        let newCell = newRow.insertCell(qty);
        let cellText = document.createTextNode(attributes[qty]);
        newCell.appendChild(cellText);
    }
    let actionsCell = newRow.insertCell(attributes.length);
    let actions = document.createRange().createContextualFragment(`
        <div class="d-flex justify-content-end">
            <a class="btn btn-app" href="/authors/` + author.id + `/edit">
                <i class="fas fa-edit"></i> Edytuj
            </a>
            <a class="btn btn-app" onclick="deleteAuthorPopup(` + author.id + `,'` + author.surname + `','` + author.name + `')">
                <i class="fas fa-trash-alt"></i> Usuń
            </a>
        </div>`);

    actionsCell.appendChild(actions);
}
