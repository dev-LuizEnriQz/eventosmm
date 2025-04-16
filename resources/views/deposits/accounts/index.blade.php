<x-app-layout title="Cuentas de Depósito">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Cuentas de Depósito</h2>
                <a href="{{route('deposits.accounts.registrarCuentaDeposito')}}" class="btn btn-primary">Crear una Nueva Cuenta</a>
            </div>
            <div class="card-body">
                <table id="depositsAccountsTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nº Cuenta</th>
                            <th>Cliente</th>
                            <th>Nº Cotización</th>
                            <th>Costo Total</th>
                            <th>Deposito Inicial</th>
                            <th>Saldo Pendiente</th>
                            <th>Fecha Limite</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <h6>En caso de inconsistencias, favor de reportarlas.</h6>
            </div>
        </div>
    </div>
    <!-- Modal Registrar Depósito -->
    <div class="modal fade" id="registerDepositModal" tabindex="-1" aria-labelledby="registerDepositModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="registerDepositForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerDepositModalLabel">Registrar Depósito</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="deposit_account_id" id="deposit_account_id">

                        <div class="mb-3">
                            <label for="payment_date" class="form-label">Día del Depósito</label>
                            <p class="form-control-plaintext" id="payment_date">{{\Carbon\Carbon::now()->format('d-m-Y')}}</p>
                            <input type="hidden" name="payment_date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Monto</label>
                            <input type="number" step="0.01" class="form-control" name="amount" id="amount" required>
                        </div>

                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Método de Pago</label>
                            <select class="form-select" name="payment_method" id="payment_method" required>
                                <option value="">Seleccionar...</option>
                                <option value="efectivo">Efectivo</option>
                                <option value="transferencia">Transferencia</option>
                                <option value="tarjeta">Tarjeta</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="deposit_type" class="form-label">Tipo de Depósito</label>
                            <select class="form-select" name="deposit_type" id="deposit_type" required>
                                <option value="">Seleccionar...</option>
                                <option value="inicial">Inicial</option>
                                <option value="parcial">Parcial</option>
                                <option value="final">Final</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Depósito</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Toast de Notificación -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
        <div id="depositToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="depositToastMessage">
                    Depósito registrado exitosamente.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
            </div>
        </div>
    </div>
    <!--Script donde va la Ruta para ejecutar depositos-->
    <script>
        const storeDepositUrl = "{{ route('deposits.movements.store') }}";
    </script>
    @vite(['resources/js/custom/modal/registerDeposit.js'])
    @vite(['resources/js/custom/dataTables/depositsAccountsTable.js'])
</x-app-layout>
