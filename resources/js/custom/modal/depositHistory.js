import $ from 'jquery';
import * as bootstrap from 'bootstrap';
import {Modal} from 'bootstrap';

$(document).ready(function (){
    let historyModal = new Modal(document.getElementById('depositHistoryBody'))

    //Abrir el Modal
    $(document).on('click', '.show-deposit-history', function (){
        const accountId = $(this).data('account-id');
        const url = historyDepositUrl.replace(':id', accountId);

        console.log("URL generada para obtener historial:",url); //Console Log para verificar la ruta obtenida

    //Ejecución del ajax para la muestra la obtencion de los datos
        $.ajax({
            url: url,
            method: 'GET',
            beforeSend: function () {
                $('#spinnerRow').show();
                $('#deposit-history-body').hide();
            },
            success: function(deposits){
                console.log(deposits);

                let tbody = '';
                deposits.deposits.forEach(deposit => {
                    tbody += `
                        <tr>
                            <td>${deposit.id}</td>
                            <td>${deposit.date}</td>
                            <td>$${deposit.amount}</td>
                            <td>${deposit.user}</td>
                        </tr>
                    `;
                });
            $('#depositHistoryBody').html(tbody);
            $('#spinnerRow').hide();
            $('#deposit-history-body').show();
            },
            error:function (){
                $('#depositHistoryBody').html('<tr><td colspan="4" class="text-center text-danger">Error al cargar el historial.</td></tr>')
            }
        });
    });

    function formatDate(dateStr){
        const date = new Date(dateStr);
        return date.toLocaleDateString('es-MX', {day:'2-digit', month:'2-digit',year:'numeric'});
    }
})
