import $ from "jquery";
import 'datatables.net'; // Importar la funcionalidad de DataTables
import 'datatables.net-bs5'; // Importar DataTables con soporte de Bootstrap 5

$(document).ready(function (){
    $('#quotesTable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: '/quotes/api/quotes',
            type: 'GET',
        },
        columns: [
            {data:'id', name:'id'},
            {data: 'folio', name: 'folio'},
            {data: 'client_name', name: 'client_name'},
            {data: 'client_company', name: 'client_company'},
            {data: 'event_date', name: 'event_date'},
            {data: 'guests', name: 'guests'},
            {data: 'event_type', name: 'event_type'},
            {data: 'package_type', name: 'package_type'},
            {data: 'description', name:'description'},
            {data: 'status', name: 'status'},
            {
                data: 'actions', name: 'actions',
                orderable: false,
                searchable: false,
            },
        ]
    });
});
