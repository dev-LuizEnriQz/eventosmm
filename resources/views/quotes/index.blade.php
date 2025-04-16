<x-app-layout title="Consulta Cotización">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Lista de Cotizaciones</h2>
                <a href="{{route('quotes.registrarCotizacion')}}" class="btn btn-primary">Crear una Nueva Cotización</a>
            </div>
            <div class="card-body">
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
            <div class="card-footer">
                <h6>En caso de inconsistencias, favor de reportarlas.</h6>
            </div>
        </div>
    </div>
    @vite(['resources/js/custom/dataTables/quotes_indexTable.js'])
</x-app-layout>
