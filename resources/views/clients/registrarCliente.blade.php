<x-app-layout title="Registrar Cliente">
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            Registrar Cliente
        </div>
        <div class="card-body">
            <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <!--Campo Nombre-->
                <div class="col-md-4">
                    <label for="first_name" class="form-label">Nombre o Nombres</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}" required autofocus autocomplete="first_name">
                    @if ($errors->has('first_name'))
                        <div class="text-danger">
                            {{$errors->first('first_name')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo validado!
                    </div>
                </div>
                <!--Campo Apellido Paterno-->
                <div class="col-md-4">
                    <label for="last_name" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}" required autofocus autocomplete="last_name">
                    @if ($errors->has('last_name'))
                        <div class="text-danger">
                            {{$errors->first('last_name')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo Validado!
                    </div>
                </div>
                <!--Campo Apellido Materno-->
                <div class="col-md-4">
                    <label for="second_surname" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="second_surname" name="second_surname" value="{{old('second_surname')}}">
                    @if ($errors->has('second_surname'))
                        <div class="text-danger">
                            {{$errors->first('second_surname')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo Validado!
                    </div>
                </div>
                <!--Campo Telefono de Contacto-->
                <div class="col-md-4">
                    <label for="phone" class="form-label">Telefono de Contacto</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{old('phone')}}" required autofocus autocomplete="phone">
                    @if ($errors->has('phone'))
                        <div class="text-danger">
                            {{$errors->first('phone')}}
                        </div>
                    @endif
                    <div class="invalid-feedback" type="tel">
                        Por favor de ingresar un # telefonico!
                    </div>
                </div>
                <!--Campo de Correo Electronico-->
                <div class="col-md-4">
                    <label for="email" class="form-label">Correo electronico</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required autofocus autocomplete="email">
                    @if ($errors->has('email'))
                        <div class="text-danger">
                            {{$errors->first('email')}}
                        </div>
                    @endif
                    <div class="invalid-feedback" type="email">
                        Por favor de ingresar un correo electronico!
                    </div>
                </div>
                <!--Campo Nombre de la Empresa-->
                <div class="col-md-4">
                    <label for="company" class="form-label">Empresa</label>
                    <input type="text" class="form-control" id="company" name="company" value="{{old('company')}}">
                    @if ($errors->has('company'))
                        <div class="text-danger">
                            {{$errors->first('company')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo Validado!
                    </div>
                </div>
                <!--Campo RFC-->
                <div class="col-md-4">
                    <label for="rfc" class="form-label">RFC</label>
                    <input type="text" class="form-control" id="rfc" name="rfc" value="{{old('rfc')}}">
                    @if ($errors->has('rfc'))
                        <div class="text-danger">
                            {{$errors->first('rfc')}}
                        </div>
                    @endif
                    <div class="valid-feedback">
                        Campo Validado!
                    </div>
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
</x-app-layout>
