@extends('layouts.tienda')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="p-3 text-center">Productos en existencia</h1>
        </div>
        <div class="col-md-12">
            <div class="card" style="width: 100%">
                <div class="card-body">

                    @foreach ($productos as $producto)

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


                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
