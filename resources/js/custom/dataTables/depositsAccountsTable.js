import $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs5'

$(document).ready(function (){
    $('#depositsAccountsTable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: '/deposits/accounts',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id'},
            { data: 'client_name', name: 'client_name'},
            { data: 'quote_folio', name: 'quote_folio'},
            { data: 'total_cost', name: 'total_cost'},
            { data: 'initial_deposit', name: 'initial_deposit'},
            { data: 'payment_deadline', name: 'payment_deadline'},
            {
                data: 'action', name: 'action',
                orderable: false,
                searchable: false,
            },
        ]
    })
})
