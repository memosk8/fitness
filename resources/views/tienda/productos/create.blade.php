@extends('layouts.tienda')

@section('main-content')
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro | Nuevo Producto') }}</div>

                    <div class="card-body">
                        <h3 class="card-header">Registrar producto</h3>
                        <br>
                        <form method="POST" action="{{ route('productos.registro') }}">
                            @csrf
                            
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Nombre del producto</label>
                                <input type="text" name="nombre" class="input-group" required >
                            </div>
                            @error('nombre')
                               <p>Error con el nombre</p> 
                            @enderror

                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Descripción</label>
                                <input type="text" name="desc" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Precio $</label>
                                <input type="text" name="precio" placeholder="Cantidad en pesos" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="desc" class="card-title m-2">Costo $</label>
                                <input type="text" name="costo" placeholder="Cantidad en pesos" class="input-group" required>
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="almacen" class="card-title m-2">Almacén</label>
                                <input type="number" name="almacen" class="input-group" required max="{{ $almacenes }}" min="1">
                            </div>
                            <br>
                            <div class="form-control border-4 input-group-text">
                                <label for="stock" class="card-title m-2">Stock</label>
                                <input type="number" name="stock" placeholder="Cantidad del producto" class="input-group" required min="1">
                            </div>

                            <button type="submit" class="btn btn-dark mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
