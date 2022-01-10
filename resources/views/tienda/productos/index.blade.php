@extends('layouts.tienda')

@section('main-content')
    <div class="row">
        <div class="col-md-12 p-3">
            <h1 class=" text-center bg-light p-2 mx-md-5">Productos en existencia</h1>
        </div>
        <div class="col-md-12">
            <div class="card" style="width: 100%">
                <div class="card-body ">
                    {{-- @foreach ($productos as $producto)

                        <h5 class="card-title pt-4">Precio: {{ $producto->precio }}</h5>

                        <p class="card-text">
                            Nombre: {{ $producto->nombre }}
                        </p>
                        <p class="card-text">
                            Costo: {{ $producto->costo }}
                        </p>
                        <p class="card-text">
                            En stock: {{ $stock }}
                        </p>


                    @endforeach --}}

                    <table class="table table-bordered table-sm table-striped text-center">

                        <thead>
                            <tr class="bg-info ">
                                <th scope="col"># ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Costo</th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
