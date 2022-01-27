@extends('layouts.tienda')
@section('title', 'Registrar producto')
@section('main-content')
    <div class="container-fluid">
        <div class="row justify-content-around">

            <div class="col-md-8">
                <br>
                <div class="card border-2 border-dark">
                    <div class="card-header h4 border-primary border-1 bg-primary bg-opacity-25">{{ __('Productos | Actualizar Producto') }}</div>

                    <div class="card-body text-end bg-white">
                        
                        <form method="POST" action="{{ route('productos.update',$producto->id ) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0 ">
                                <label for="nombre" class="m-2 text-info m-0 col-3 text-end">Nombre del producto</label>
                                <input type="text" name="nombre" class="input-group border-1 p-2 px-3" required
                                    value="{{ $producto->nombre }}">
                            </div>
                            @error('nombre')
                                <a>Error con el nombre</a>
                            @enderror
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="desc" class=" m-2 text-info col-3 text-end">Descripción</label>
                                <input type="text" name="desc" class="input-group border-1 p-2 px-3" required
                                    value="{{ $producto->desc }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="precio" class=" m-2 text-info m-0 col-3 text-end">Precio $</label>
                                <input type="text" name="precio" placeholder="Cantidad en pesos" class="input-group border-1 p-2 px-3"
                                    required value="{{ $producto->precio }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="costo" class="m-2 text-info m-0 col-3 text-end">Costo $</label>
                                <input type="text" name="costo" placeholder="Cantidad en pesos" class="input-group border-1 p-2 px-3"
                                    required value="{{ $producto->costo }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="almacen" class="m-2 text-info m-0 col-3 text-end">Almacen</label>
                                <input type="number" name="almacen" class="input-group border-1 p-2 px-3" required
                                    value="{{ $producto->almacen }}" max="{{ DB::table('warehouses')->count() }}" min="1">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                              <label for="stock" class="m-2 text-info m-0 col-3 text-end">Stock</label>
                              <input type="number" name="stock" class="input-group border-1 p-2 px-3" required
                                  value="{{ $producto->stock }}" max="1000" min="0">
                          </div>
                          <br>
                              <button type="submit" class="btn btn-dark mb-1 text-info">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
