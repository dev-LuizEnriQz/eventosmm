<x-app-layout title="Registrar una Cuenta de Depósito">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Registrar una nueva Cuenta de Depósito
            </div>
            <div class="card-body">
                <div class="row">
                    <!--Campo de busqueda de cliente -->
                    <div class="col-md-8 mt-1">
                        <label for="client_search" class="form-label">Buscar Cliente</label>
                        <input type="text" id="client_search" class="form-control" placeholder="Escribe el nombre del cliente..." autocomplete="off">
                        <ul id="client-results" class="list-group mt-1" style="background: #c5d7f2"></ul>
                    </div>

                    <!-- Campo de busqueda de cotizacion-->
                    <div class="col-md-4 mt-1">
                        <label for="folio_search" class="form-label">Buscar Cotización</label>
                        <input type="text" id="folio_search" class="form-control" placeholder="Escribe el folio de Cotización..." autocomplete="off">
                        <ul id="quote-results" class="list-group mt-1" style="background: #c5d7f2"></ul>
                    </div>
                </div>
                <form action="{{ route('deposits.accounts.store') }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    @csrf

                    <!--Formulario de Registro de Cuenta-->


                    <!--Campo de Acepto terminos y condiciones-->
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="invalidCheck" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Aceptas termino y condiciones!
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
