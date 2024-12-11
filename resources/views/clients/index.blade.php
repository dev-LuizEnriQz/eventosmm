<x-app-layout title="Consulta Clientes">
    <div class="container">
        <div class="justify-content-center mt-5">
        <h1>Lista de Clientes</h1>
        <table id="clientsTable" class="display table table-striped mt-2">
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
                    <th>Asesor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- Cuerpo del Data Table-->
            <tbody>

            </tbody>
        </table>
        </div>
    </div>
    @vite(['resources/js/custom/dataTables/clients_indexTable.js'])
</x-app-layout>
