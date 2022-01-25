@extends('layouts.tienda')

@section('main-content')
    <div class="container-fluid">
        <div class="row justify-content-around">

            <div class="col-md-8">
                <br>
                <div class="card border-2 border-dark">
                    <div class="card-header h4 border-primary border-1 bg-primary bg-opacity-25">{{ __('Clientes | Actualizar Cliente') }}</div>

                    <div class="card-body text-end bg-white">
                        
                        <form method="POST" action="{{ route('clientes.update',$cliente->id ) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0 ">
                                <label for="nombre" class="m-2 text-info m-0 col-3 text-end">Nombre del cliente</label>
                                <input type="text" name="nombre" class="input-group border-1 p-2 px-3" required
                                    value="{{ $cliente->nombre }}">
                            </div>
                            @error('nombre')
                                <a>Error con el nombre</a>
                            @enderror
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="cuota" class=" m-2 text-info col-3 text-end">Cuota</label>
                                <input type="text" name="cuota" class="input-group border-1 p-2 px-3" required
                                    value="{{ $cliente->cuota }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="apellidoPaterno" class=" m-2 text-info m-0 col-3 text-end">Apellido paterno</label>
                                <input type="text" name="apellidoPaterno" class="input-group border-1 p-2 px-3"
                                    required value="{{ $cliente->apellidoPaterno }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="apellidoMaterno" class="m-2 text-info m-0 col-3 text-end">Apellido Materno</label>
                                <input type="text" name="apellidoMaterno" class="input-group border-1 p-2 px-3"
                                    required value="{{ $cliente->apellidoMaterno }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="calle" class="m-2 text-info m-0 col-3 text-end">Calle</label>
                                <input type="text" name="calle" class="input-group border-1 p-2 px-3" required
                                    value="{{ $cliente->calle }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                              <label for="numInt" class="m-2 text-info m-0 col-3 text-end">Numero Interior</label>
                              <input type="number" name="numInt" class="input-group border-1 p-2 px-3" required
                                  value="{{ $cliente->numInt }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                              <label for="numExt" class="m-2 text-info m-0 col-3 text-end">Numero Exterior</label>
                              <input type="number" name="numExt" class="input-group border-1 p-2 px-3" required
                                  value="{{ $cliente->numExt }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="ciudad" class="m-2 text-info m-0 col-3 text-end">Ciudad</label>
                                <input type="text" name="ciudad" class="input-group border-1 p-2 px-3" required
                                    value="{{ $cliente->ciudad }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="estado" class="m-2 text-info m-0 col-3 text-end">Estado</label>
                                <input type="text" name="estado" class="input-group border-1 p-2 px-3" required
                                    value="{{ $cliente->estado }}">
                            </div>
                            <br>
                            <div class="form-control border-0 border-dark text-dark input-group-text bg-dark p-0">
                                <label for="cp" class="m-2 text-info m-0 col-3 text-end">Codigo Postal</label>
                                <input type="number" name="cp" class="input-group border-1 p-2 px-3" required
                                    value="{{ $cliente->cp }}">
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
