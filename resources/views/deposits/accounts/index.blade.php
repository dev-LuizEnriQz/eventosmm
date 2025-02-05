<x-app-layout title="Cuentas de Depósito">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h5>Cuentas de Depósito</h5>
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
                            <th>Fecha Limite</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@vite(['resources/js/custom/dataTables/depositsAccountsTable.js'])
</x-app-layout>
