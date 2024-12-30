<x-app-layout title="Consulta Cotización">
    <div class="container">
        <div class="justify-content-center mt-5">
            <h1>Lista de Cotizaciones</h1>
            <table id="quotesTable" class="display table table-striped mt-2">
                <!--Encabezado de la Data Table -->
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Folio</th>
                    <th>Cliente</th>
                    <th>Compañia</th>
                    <th>Dia del evento</th>
                    <th>Nº Invitados</th>
                    <th>Tipo de evento</th>
                    <th>Paquete</th>
                    <th>Descripción</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <!-- Cuerpo del Data Table-->
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    @vite(['resources/js/custom/dataTables/quotes_indexTable.js'])
</x-app-layout>
