<x-app-layout title="Editar Cliente">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Editar Cliente
            </div>
            <div class="card-body">
                <form action="{{ route('clients.update',$client->id) }}" method="post" enctype="multipart/form-data" class="row g-3">
                    @method('PATCH')
                    @csrf
                    <!--Campo Nombre-->
                    <div class="col-md-4">
                        <label for="first_name" class="form-label">Nombre o Nombres</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{$client->first_name}}">
                    </div>
                    <!--Campo Apellido Paterno-->
                    <div class="col-md-4">
                        <label for="last_name" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{$client->last_name}}">
                    </div>
                    <!--Campo Apellido Materno-->
                    <div class="col-md-4">
                        <label for="second_surname" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="second_surname" name="second_surname"
                        value="{{$client->second_surname}}">
                    </div>
                    <!--Campo Telefono de Contacto-->
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Telefono de Contacto</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                        value="{{$client->phone}}">
                    </div>
                    <!--Campo de Correo Electronico-->
                    <div class="col-md-4">
                        <label for="email" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" id="email" name="email"
                        value="{{$client->email}}">
                    </div>
                    <!--Campo para empresa-->
                    <div class="col-md-4">
                        <label for="company" class="form-label">Compañia</label>
                        <input type="text" class="form-control" id="company" name="company"
                        value="{{$client->company}}">
                    </div>

                    <div class="col-11">
                        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <h7>En caso de inconsistencias, favor de reportarlas.</h7>
            </div>
        </div>
    </div>
</x-app-layout>
