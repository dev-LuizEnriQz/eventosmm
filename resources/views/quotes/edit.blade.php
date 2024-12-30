<x-app-layout title="Editar Cotización">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Editar una Cotizacion
            </div>
            <div class="card-body">
                <form action="{{route('quotes.update',$quote->id)}}" method="post" enctype="multipart/form-data" class="row g-3">
                    @method('PATCH')
                    @csrf
                    <!--Nombre del Cliente solo Lectura-->
                    <div class="col-md-6">
                        <label class="form-label">Nombre del Cliente</label>
                        <input type="text" class="form-control"
                               value="{{$quote->client_name}}" readonly>
                    </div>
                    <!--Numero de Invitados-->
                    <div class="col-md-3">
                        <label class="form-label" for="guests"> Nº de Invitados</label>
                        <input type="number" id="guests" name="guests" class="form-control"
                               value="{{$quote->guests}}" required>
                    </div>
                    @if ($errors->has('guests'))
                        <div class="text-danger">
                            {{$errors->first('guests')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo validado!
                    </div>
                    <!--Fecha y Hora del Evento-->
                    <div class="col-md-3">
                        <label class="form-label" for="event_date">Fecha y Hora del Evento</label>
                        <input type="text" id="event_date" name="event_date" class="form-control"
                               value="{{old('event_date',$quote->event_date->format('Y-m-d H:i'))}}" required>
                    </div>
                    <!--Tipo de Evento-->
                    <div class="col-md-3">
                        <label class="form-label" for="event_type">Tipo de Evento</label>
                        <select id="event_type" name="event_type" class="form-select" required>
                            <option value="boda" {{$quote->event_type == 'boda' ? 'selected' : ''}}>Boda</option>
                            <option value="quinceañera" {{$quote->event_type == 'quinceañera' ? 'selected' : ''}}>Quinceañera</option>
                            <option value="graduación" {{$quote->event_type == 'graduación' ? 'selected' : ''}}>Graduación</option>
                            <option value="bautizo" {{$quote->event_type == 'bautizo' ? 'selected' : ''}}>Bautizo</option>
                            <option value="posada" {{$quote->event_type == 'posada' ? 'selected' : ''}}>Posada</option>
                            <option value="empresarial" {{$quote->event_type == 'empresarial' ? 'selected' : ''}}>Empresarial</option>
                            <option value="otro" {{$quote->event_type == 'otro' ? 'selected' : ''}}>Otro</option>
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
                    <!-- Tipo de Paquete-->
                    <div class="col-md-3">
                        <label class="form-label" for="package_type">Tipo de Paquete</label>
                        <select id="package_type" name="package_type" class="form-select" required>
                            <option value="básico" {{$quote->package_type == 'básico' ? 'selected' : ''}}>Básico</option>
                            <option value="intermedio" {{$quote->package_type == 'intermedio' ? 'selected' : ''}}>Intermedio</option>
                            <option value="premium" {{$quote->package_type == 'premium' ? 'selected' : ''}}>Premium</option>
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
                    <!--Estado-->
                    <div class="col-md-3">
                        <label class="form-label" for="status">Estado</label>
                        <select id="status" name="status" class="form-select" required>
                            <option value="pending"{{$quote->status == 'pending' ? 'selected' : ''}}>Pendiente</option>
                            <option value="approved"{{$quote->status == 'approved' ? 'selected' : ''}}>Aprovado</option>
                            <option value="rejected"{{$quote->status == 'rejected' ? 'selected' : ''}}>Rechazado</option>
                        </select>
                    </div>
                    @if ($errors->has('status'))
                        <div class="text-danger">
                            {{$errors->first('status')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo validado!
                    </div>
                    <!--Descripción-->
                    <div class="col-md-12">
                        <label class="form-label" for="description">Notas</label>
                        <textarea id="description" name="description" class="form-control" rows="3">{{ $quote->description}} </textarea>
                    </div>
                    <!--Confirmo Modificaciones realizadas-->
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="invalidCheck" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Confirmo las modificaciones realizadas!
                            </label>
                            @if ($errors->has('invalidCheck'))
                                <div class="text-danger">
                                    {{$errors->first('invalidCheck')}}
                                </div>
                            @endif
                            <div class="invalid-feedback">
                                Tienes que aceptar condiciones antes de continuar.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{route('quotes.index')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <h6>En caso de inconsistencias, favor de reportarlas.</h6>
            </div>
        </div>
    </div>
    @vite(['resources/js/custom/flatpickr/event_date_quote.js'])
</x-app-layout>
