<x-app-layout title="Registrar Cliente">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Registrar Cotización
            </div>
            <div class="card-body">
                <!--Campo Nombre-->
                <div class="col-md-12">
                    <label class="form-label" for="client-search">Buscar Cliente:</label>
                    <input class="form-control" type="text" id="client-search" placeholder="Escribe el nombre del cliente o empresa..." autocomplete="off">
                    <ul id="client-results" style="display: none;">
                        <!--Los resultados de la busqueda apareceran aquí-->
                    </ul>
                </div>
                <form action="{{ route('quotes.store') }}" method="post" id="event-form" enctype="multipart/form-data" class="row g-3 mt-1 needs-validation" novalidate>
                    @csrf
                    <!--Datos del Cliente seleccionado-->
                    <div class="col-md-2">
                        <label class="form-label" for="client-id">ID Cliente</label>
                        <input class="form-control" type="text" id="client-id" name="client_id" readonly>
                    </div>
                    <div class="col-md-4">
                        <label  class="form-label" for="client-name">Nombre del cliente</label>
                        <input class="form-control" type="text" id="client-name" readonly>
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label" for="client-company">Empresa</label>
                        <input class="form-control" type="text" id="client-company" readonly>
                    </div>
                    <!--Datos del Evento-->
                    <div class="col-md-3">
                        <label class="form-label" for="guests">Número de invitados:</label>
                        <input class="form-control" type="number" id="guests" name="guests" placeholder="Ejemplo: 100" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="event-date">Fecha del evento:</label>
                        <input
                            class="form-control"
                            type="text"
                            id="event-date"
                            name="event_date"
                            placeholder="Seleccione una fecha disponible:"
                            required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="event-type">Tipo de evento:</label>
                        <select class="form-select" id="event-type" name="event_type" required>
                            <option value="boda">Boda</option>
                            <option value="quinceañera">Quinceañera</option>
                            <option value="graduación">Graduación</option>
                            <option value="bautizo">Bautizo</option>
                            <option value="posada">Posada</option>
                            <option value="empresarial">Empresarial</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="package">Paquete del evento:</label>
                        <select class="form-select" id="package" name="package" required>
                            <option value="básico">Básico</option>
                            <option value="intermedio">Intermedio</option>
                            <option value="premium">Premium</option>
                        </select>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="description" name="description" placeholder="Comentarios" style="height: 100px"></textarea>
                        <label class="form-label" for="description">Observaciones o Notas adicionales:</label>
                    </div>

                    <button class="btn btn-primary" type="submit">Guardar cotización</button>

                </form>
            </div>
            <div class="card-footer">
                <h7>En caso de inconsistencias, favor de reportarlas.</h7>
            </div>
        </div>
    </div>
    @vite(['resources/js/custom/searches/client_search.js'])
{{--
    @vite(['resources/js/custom/flatpickr/event_date_quote.js'])
--}}
</x-app-layout>
