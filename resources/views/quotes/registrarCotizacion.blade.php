<x-app-layout title="Registrar Cliente">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Registrar Cotización
            </div>
            <div class="card-body">
                <form action="{{ route('quotes.store') }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <!--Campo Nombre-->
                    <div class="col-md-12">
                        <label class="form-label" for="client-search">Buscar Cliente:</label>
                        <input class="form-control" type="text" id="client-search" placeholder="Escribe el nombre del cliente o empresa..." autocomplete="off">
                        <ul id="client-results" style="display: none;">
                            <!--Los resultados de la busqueda apareceran aquí-->
                        </ul>
                    </div>
                    <!--Formulario donde se cargaran los datos seleccionados-->
                    <div id="client-details" style="display: none;">
                        <input type="hidden" id="client-id" name="client_id">
                        <p>Nombre: <span id="client-name"></span></p>
                        <p>Compañia: <span id="client-company"></span></p>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <h7>En caso de inconsistencias, favor de reportarlas.</h7>
            </div>
        </div>
    </div>
    @vite(['resources/js/custom/searches/client_search.js'])
</x-app-layout>
