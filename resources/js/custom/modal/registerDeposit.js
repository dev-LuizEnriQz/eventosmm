import $ from 'jquery';
import * as bootstrap from 'bootstrap';
import { Modal } from 'bootstrap';

$(document).ready(function() {
   let registerModal = new Modal(document.getElementById('registerDepositModal'));

   //Abrir el Modal
    $(document).on('click','.register-deposit', function (){
        const depositAccountId = $(this).data('id');
        const clientNAme = $(this).data('client')

        $('#registerDepositModalLabel').text('Registrar Depósito para ' + clientNAme);
        $('#deposit_account_id').val(depositAccountId);
        console.log("ID cuenta asignado:", depositAccountId);
        $('#registerDepositForm')[0].reset();

        registerModal.show();
    });

    //Envío de Formulario
    $('#registerDepositForm').on('submit', function (e){
        e.preventDefault();

        let form = $(this);
        let formData = form.serialize();

        $.ajax({
            url: storeDepositUrl,
            method: 'POST',
            data: formData,
            success: function (response){
                registerModal.hide();//Ocultar el modal
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $('#registerDepositForm')[0].reset();
                alert('Depósito registrado exitosamente');

                //Mostrar el Toast con Bootstrap
                $('#depositToastMessage').text('Depósito registrado exitosamente.');

                const toast = new bootstrap.Toast(document.getElementById('depositToast'));
                toast.show();

                $('#depositsAccountsTable').DataTable().ajax.reload(null,false);
            },
            error: function (xhr){
                let errors = xhr.responseJSON.errors;
                let message = "Error al registrar el depósito:\n"

                $.each(errors, function (key, value){
                    message += '_ ' + value + '\n'
                });
                alert(message);
            }
        });
    });
});
