<x-app-layout title="Consulta Clientes">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Lista de Clientes</h2>
                <a href="{{route('clients.registrarCliente')}}" class="btn btn-primary">Crear un Nuevo Cliente</a>
            </div>
            <div class="card-body">
                <table id="clientsTable" class="table table-striped table-bordered dt-responsive mt-2">
                    <!--Encabezado de la Data Table -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Teléfono</th>
                            <th>Correo Electrónico</th>
                            <th>Empresa</th>
                            <th>RFC</th>
                            <th>Asesor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo del Data Table-->
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <h6>En caso de inconsistencias, favor de reportarlas.</h6>
            </div>
        </div>
    </div>
    @vite(['resources/js/custom/dataTables/clients_indexTable.js'])
</x-app-layout>
