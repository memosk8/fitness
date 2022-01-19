@extends('layouts.tienda')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <h1></h1>
        </div>
        <div class="col-md-12">
            <div class="card" style="width: 100%">
                <div class="card-body">

                    {{-- <div class="card-img-top">
                            <img src="{{ asset('storage/images/' . $image->url) }}" class="d-block w-100"
                                alt="{{ $image->name }}">
                        </div> --}}

                        <div class="container">
                            <h2>{{ $producto->nombre }}</h2>
                        </div>

                    {{-- <h5 class="card-title pt-4">Precio: {{ $producto->nombre }}</h5>

                    <p class="card-text">
                        Nombre: {{ $producto->nombre }}
                    </p>
                    <p class="card-text">
                        Costo: {{ $producto->costo }}
                    </p>
                    <p class="card-text">
                        En stock: {{ DB::table('product_warehouse')->select('stock')->where('product_id',$producto->id) }}
                    </p>     --}}

                    <a href="/tienda/productos/" class="btn btn-outline-primary">Volver atrás</a>
                </div>
            </div>
        </div>
    </div>

@endsection
