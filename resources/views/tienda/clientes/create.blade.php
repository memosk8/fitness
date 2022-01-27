@extends('layouts.tienda')

@section('main-content')
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro | Nuevo Cliente') }}</div>

                    <div class="card-body">
                        <h3 class="card-header">Registrar cliente</h3>
                        <br>
                        <form method="POST" action="{{ route('clientes.registro') }}">
                            @csrf
                            
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Nombre del cliente</label>
                                <input type="text" name="nombre" class="input-group" required >
                            </div>
                            @error('nombre')
                               <p>Error con el nombre</p> 
                            @enderror

                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Cuota</label>
                                <input type="text" name="cuota" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Apellido paterno</label>
                                <input type="text" name="apellidoPaterno" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Apellido materno</label>
                                <input type="text" name="apellidoMaterno"  class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Calle</label>
                                <input type="text" name="calle" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">numero Interior</label>
                                <input type="number" name="numInt" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">numero Exterior</label>
                                <input type="number" name="numExt" class="input-group" required>
                            </div>
                           <br> 
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Ciudad</label>
                                <input type="text" name="ciudad" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Estado</label>
                                <input type="text" name="estado" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Codigo Postal</label>
                                <input type="number" name="cp" class="input-group" required>
                            </div>
                           <br> 

                            <button type="submit" class="btn btn-dark mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
