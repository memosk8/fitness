@extends('layouts.tienda')

@section('tabla')
    <div class="row">
        <div class="col-md-12">
            <h1>Productos en existencia</h1>
        </div>
        <div class="col-md-12">
            <div class="card" style="width: 100%">
                <div class="card-body">
   
                    @foreach ($productos as $producto)
                        {{-- <div class="card-img-top">
                            <img src="{{ asset('storage/images/' . $image->url) }}" class="d-block w-100"
                                alt="{{ $image->name }}">
                        </div> --}}

                        <h5 class="card-title pt-4">Precio: {{ $producto->precio }}</h5>
                        
                        <p class="card-text">
                            Nombre: {{ $producto->nombre; }}
                        </p>
                        <p class="card-text">
                            Costo: {{ $producto->costo;}}
                        </p>
                        <p class="card-text">
                            En stock: {{ $stock }}
                        </p>

                        <a href="/store" class="btn btn-outline-primary">Volver atrás</a>

                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
