<x-app-layout title="Registrar Cotización">
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
                    <ul id="client-results" style="background: #c5d7f2">
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
                        <input class="form-control" type="text" id="client-name"  name="client_name" readonly>
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label" for="client-company">Empresa</label>
                        <input class="form-control" type="text" id="client-company" name="client_company" readonly>
                    </div>

                    <!--Datos del Evento-->
                    {{--Fecha del evento--}}
                    <div class="col-md-3">
                        <label class="form-label" for="event-dateTime">Fecha y Hora del evento:</label>
                        <input
                            class="form-control"
                            type="text"
                            id="event-dateTime"
                            name="event_date"
                            placeholder="Seleccione una fecha disponible:"
                            required>
                    </div>
                    @if ($errors->has('event_date'))
                        <div class="text-danger">
                            {{$errors->first('event_date')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo validado!
                    </div>
                    {{--Numero de invitados--}}
                    <div class="col-md-3">
                        <label class="form-label" for="guests">Número de invitados:</label>
                        <input class="form-control" type="number" id="guests" name="guests" placeholder="Ejemplo: 100" required>
                    </div>
                    @if ($errors->has('guests'))
                        <div class="text-danger">
                            {{$errors->first('guests')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo validado!
                    </div>
                    {{--Tipo del evento--}}
                    <div class="col-md-3">
                        <label class="form-label" for="event_type">Tipo de evento:</label>
                        <select class="form-select" id="event_type" name="event_type" required>
                            <option value="boda">Boda</option>
                            <option value="quinceañera">Quinceañera</option>
                            <option value="graduación">Graduación</option>
                            <option value="bautizo">Bautizo</option>
                            <option value="posada">Posada</option>
                            <option value="empresarial">Empresarial</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    @if ($errors->has('event_type'))
                        <div class="text-danger">
                            {{$errors->first('event_type')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo validado!
                    </div>
                    {{--Paquete a eleccion del cliente para el evento--}}
                    <div class="col-md-3">
                        <label class="form-label" for="package_type">Paquete del evento:</label>
                        <select class="form-select" id="package_type" name="package_type" required>
                            <option value="básico">Básico</option>
                            <option value="intermedio">Intermedio</option>
                            <option value="premium">Premium</option>
                        </select>
                    </div>
                    @if ($errors->has('package_type'))
                        <div class="text-danger">
                            {{$errors->first('package_type')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo validado!
                    </div>
                    {{--Notas o descripciones adicionales--}}
                    <div class="form-floating">
                        <textarea class="form-control" id="description" name="description" placeholder="Comentarios" style="height: 100px" autocomplete="off"></textarea>
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
    @vite(['resources/js/custom/flatpickr/event_date_quote.js'])
</x-app-layout>
