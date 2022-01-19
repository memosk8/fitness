@extends('layouts.tienda')

@section('main-content')
    <div class="row">
        <div class="col-12 p-1">
            <h1 class=" text-center bg-dark text-white p-2 ">Productos en existencia</h1>
        </div>
        <br>
        <div class="nav">
            <form action="{{ url('tienda/productos/buscar') }}" method="post">
                <input class="p-2 m-2" type="search" name="search" placeholder="Buscar productos..."
                    aria-label="Search" required>
            </form>

            <a href="{{ url('tienda/productos/nuevo') }}" class="btn btn-success ms-auto m-2">Registrar producto</a>
        </div>
        <br>
        {{-- {{ $productos[0]->almacen }} --}}
        <div class="col-md-12 m-0 p-0 ">
            <div class="card m-0 " style="width: 100%">
                <div class="card-body p-0 mx-2 ">

                    <table class="table table-sm m-0 text-center border-1 border-dark p-1">

                        <thead>
                            <tr class="bg-primary bg-opacity-25 ">
                                <th scope="col"># ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Almacén</th>
                                <th scope="col">Fecha registro</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row">{{ $producto->id }}</th>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->desc }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>{{ $producto->costo }}</td>
                                    <td>{{ $producto->almacen }}</td>
                                    <td>{{ $producto->created_at }}</td>
                                    <td>
                                        <a href="{{ route('producto.update.form',$producto->id) }}" class="btn btn-outline-primary">Editar</a>
                                        &nbsp;
                                        <a href="{{ route('productos.eliminar', $producto->id) }}" class="btn btn-outline-danger">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
