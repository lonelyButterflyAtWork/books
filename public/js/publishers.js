const publishersTable = document.querySelector("#publishersTableTbody");
const publishers = {
    deleteById: function (publisherId) {
        window.axios.delete(`api/publishers/destroy/${publisherId}`)
            .then(res => {
            }).catch(err => {
                console.log(err)
            })
    },
    refreshpublishersList: function () {
        window.axios.get('api/publishers')
            .then(res => {
                publishersTable.innerHTML = "";
                publishersList = res.data;
                if (Array.isArray(publishersList)) {
                    publishersList.forEach(publisher => {
                        addTableRow(publisher);
                    });
                } else {
                    Object.keys(publishersList).forEach(key => {
                        addTableRow(publishersList[key]);
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

function deletePublisherPopup(id, name) {
    if (confirm("Czy na pewno chcesz usunąć wydawnictwo " + name + "?")) {
        publishers.deleteById(id);
        publishers.refreshpublishersList();
    }
}

function addTableRow(publisher) {
    let newRow = publishersTable.insertRow(-1);
    let nameCell = newRow.insertCell(0);
    let name = document.createTextNode(publisher.name);
    let establishmentYearCell = newRow.insertCell(1);
    let establishmentYear = document.createTextNode(publisher.establishment_year);
    let actionsCell = newRow.insertCell(2);
    let actions = document.createRange().createContextualFragment(`
        <div class="d-flex justify-content-end">
            <a class="btn btn-app" href="/publishers/` + publisher.id + `/edit">
                <i class="fas fa-edit"></i> Edytuj
            </a>
            <a class="btn btn-app" onclick="deletePublisherPopup(` + publisher.id + `,'` + publisher.name + `')">
                <i class="fas fa-trash-alt"></i> Usuń
            </a>
        </div>`);

    nameCell.appendChild(name);
    establishmentYearCell.appendChild(establishmentYear);
    actionsCell.appendChild(actions);
}
