import $ from "jquery";
import 'datatables.net'; // Importar la funcionalidad de DataTables
import 'datatables.net-bs5'; // Importar DataTables con soporte de Bootstrap 5
$(document).ready(function () {
    $('#clientsTable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: '/clients/api/clients',
            type: 'GET',
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'second_surname', name: 'second_surname'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'company', name: 'company'},
            {data: 'created_by', name: 'created_by'},
            {
                data: 'actions', name: 'actions',
                orderable: false,
                searchable: false,
            },
        ],
    });
});
