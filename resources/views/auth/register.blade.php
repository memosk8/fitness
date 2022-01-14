@extends('layouts.tienda')

@section('main-content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-5 mt-2">
                <br>
                <h4 class="card-header">Registro</h4>
                <hr>
                <form action="{{ url('nuevoUsuario') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="p-2" for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" value="" required>
                        @error('nombre')
                            <div class="alert-info">Un error con el nombre</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="p-2" for="apellidoPaterno">Apellido Paterno</label>
                        <input class="form-control" type="text" name="apellidoPaterno" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="p-2" for="apellidoMaterno">Apellido Materno</label>
                        <input class="form-control" type="text" name="apellidoMaterno" value="" required>
                    </div>

                    <div class="form-group">
                        <label class="p-2" for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="p-2" for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <br>

                    <div class="form-group">
                        <label class="p-2" for="rol">Area de trabajo</label>
                        <select name="rol" required>
                            <option value="adm">Administración</option>
                            <option value="profes">Profesores</option>
                            <option value="rh">Recursos Humanos</option>
                            <option value="tienda">Tienda</option>
                        </select>
                    </div>

                    <br>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
