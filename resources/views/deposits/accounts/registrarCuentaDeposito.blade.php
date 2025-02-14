<x-app-layout title="Registrar una Cuenta de Depósito">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Registrar una nueva Cuenta de Depósito
            </div>
            <div class="card-body">
                <div class="row">
                    <!--Campo de busqueda de cliente -->
                    <div class="col-md-8 mt-1 mb-3">
                        <label for="client_search" class="form-label">Buscar Cliente</label>
                        <input type="text" id="client_search" class="form-control" placeholder="Escribe el nombre del cliente..." autocomplete="off">
                        <ul id="client-results" class="list-group mt-1" style="background: #c5d7f2"></ul>
                    </div>

                    <!-- Campo de busqueda de cotizacion-->
                    <div class="col-md-4 mt-1 mb-3">
                        <label for="folio_search" class="form-label">Buscar Cotización</label>
                        <input type="text" id="folio_search" class="form-control" placeholder="Escribe el folio de Cotización..." autocomplete="off">
                        <ul id="quote-results" class="list-group mt-1" style="background: #c5d7f2"></ul>
                    </div>
                </div>
                <form action="{{ route('deposits.accounts.store') }}" method="post" id="depositAccount-form" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <!--Formulario de Registro de Cuenta-->
                    {{--Nombre del Cliente--}}
                    <div class="col-md-8">
                        <label  class="form-label" for="client-name">Nombre del cliente</label>
                        <input class="form-control" type="text" id="client-name"  name="client_name" readonly>
                        <input type="hidden" id="client-id" name="client_id">
                    </div>
                    {{--Nº de Folio o de Cotización--}}
                    <div class="col-md-4">
                        <label class="form-label" for="quote-folio">Nº de Folio / Cotización</label>
                        <input class="form-control" type="text" id="quote-folio" name="quote_folio" readonly>
                        <input type="hidden" id="quote-id" name="quote_id">
                    </div>
                    {{--Ingresar el costo total del evento--}}
                    <div class="col-md-4">
                        <label class="form-label" for="total-cost">Ingresar el costo total del Evento</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input class="form-control" type="number" id="total-cost"  step="0.01" name="total_cost" required>
                        </div>
                    </div>
                    {{--Ingresar el deposito Inicial--}}
                    <div class="col-md-4">
                        <label class="form-label" for="initial-deposit">Ingresar el Deposito Inicial</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input class="form-control" type="number" id="initial-deposit" step="0.01" name="initial_deposit" required>
                        </div>
                    </div>
                    {{--Ingresar el Metodo de Pago--}}
                    <div class="col-md-4">
                        <label class="form-label" for="payment-method">Ingresar el Metodo de Pago</label>
                        <select class="form-select" id="payment-method" name="payment_method" required>
                            <option selected>Seleccione un método de pago</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="transferencia">Transferencia</option>
                            <option value="creditoDebito">Tarjeta de Crédito / Débito</option>
                        </select>
                    </div>
                    {{--Fecha limite de Pago--}}
                    <div class="col-md-4">
                        <label class="form-label" for="payment-deadline">Ingresar la Fecha Limite de pago</label>
                        <input class="form-control" type="date" id="payment-deadline" name="payment_deadline" required>
                    </div>

                    <!--Campo de Acepto terminos y condiciones-->
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="invalidCheck" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Confirmo los datos ingresados en el formulario.
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
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Completar Registro</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <h6>En caso de inconsistencias, favor de reportarlas.</h6>
            </div>
        </div>
    </div>
    @vite(['resources/js/custom/searches/clientQuote_search.js'])
</x-app-layout>
