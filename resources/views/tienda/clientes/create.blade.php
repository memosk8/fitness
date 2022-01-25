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
                                <label for="desc" class="form-label">Nombre del cliente</label>
                                <input placeholder="su nombre(s)"type="text" name="nombre" class="input-group" required >
                            </div>
                            @error('nombre')
                               <p>Error con el nombre</p> 
                            @enderror

                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="form-label">Cuota</label>
                                <input type="text" name="cuota" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="form-label">Apellido paterno</label>
                                <input type="text" name="apellidoPaterno" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="form-label">Apellido materno</label>
                                <input type="text" name="apellidoMaterno"  class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="form-label">Calle</label>
                                <input placeholder="nombre de la dirrecion"type="text" name="calle" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="form-label">numero Interior</label>
                                <input placeholder="escriba el numero interior"type="number" name="numInt" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="form-label">numero Exterior</label>
                                <input placeholder="escriba el numero exterior"type="number" name="numExt" class="input-group" required>
                            </div>
                           <br> 
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="form-label">Ciudad</label>
                                <input placeholder="ejemplo guadalajara"type="text" name="ciudad" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="form-label">Estado</label>
                                <input placeholder="ejemplo jalisco"type="text" name="estado" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="form-label">Codigo Postal</label>
                                <input type="number" name="cp" class="input-group" required>
                            </div>
                           <br> 

                            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
