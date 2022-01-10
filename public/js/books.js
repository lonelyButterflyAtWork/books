const booksTable = document.querySelector("#booksTableTbody");
const books = {
    deleteById: function (bookId) {
        window.axios.delete(`api/books/destroy/${bookId}`)
            .then(res => {
            }).catch(err => {
                console.log(err)
            })
    },
    refreshAuthorsList: function () {
        window.axios.get('api/books')
            .then(res => {
                booksTable.innerHTML = "";
                booksList = res.data;
                if (Array.isArray(booksList)) {
                    booksList.forEach(book => {
                        addTableRow(book);
                    });
                } else {
                    Object.keys(booksList).forEach(key => {
                        addTableRow(booksList[key]);
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

function deleteBookPopup(id, title) {
    if (confirm("Czy na pewno chcesz usunąć książkę " + title + "?")) {
        books.deleteById(id);
        books.refreshAuthorsList();
    }
}

function addTableRow(book) {
    let attributes = [
        book.title,
        book.author.surname + " " + book.author.name,
        book.isbn,
        book.publisher.name,
        book.publication_year
    ];

    let newRow = booksTable.insertRow(-1);

    for (let qty = 0; qty < attributes.length; qty++) {
        let newCell = newRow.insertCell(qty);
        let cellText = document.createTextNode(attributes[qty]);
        newCell.appendChild(cellText);
    }
    let actionsCell = newRow.insertCell(attributes.length);
    let actions = document.createRange().createContextualFragment(`
        <div class="d-flex justify-content-end">
            <a class="btn btn-app" href="/books/` + book.id + `/edit">
                <i class="fas fa-edit"></i> Edytuj
            </a>
            <a class="btn btn-app" onclick="deleteBookPopup(` + book.id + `,'` + book.title + `')">
                <i class="fas fa-trash-alt"></i> Usuń
            </a>
        </div>`);

    actionsCell.appendChild(actions);
}
