import $ from 'jquery';
import 'datatables.net'; // Importar la funcionalidad de DataTables
import 'datatables.net-bs5'; // Importar DataTables con soporte de Bootstrap 5

$(document).ready(function (){
    $('#depositsAccountsTable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: '/deposits/accounts/api/data',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id'},
            { data: 'client_name', name: 'client_name'},
            { data: 'quote_folio', name: 'quote_folio'},
            { data: 'total_cost', name: 'total_cost'},
            { data: 'initial_deposit', name: 'initial_deposit'},
            { data: 'remaining_balance', name:'remaining_balance'},
            { data: 'payment_deadline', name: 'payment_deadline'},
            {
                data: 'action', name: 'action',
                orderable: false,
                searchable: false,
            },
        ]
    })
});
