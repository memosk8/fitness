@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Productos en existencia</h1>
        </div>
        <div class="col-md-12">
            <div class="card" style="width: 100%">
                <div class="card-body">
                {{ $productos }}
                    @foreach ($productos as $producto)
                        {{-- <div class="card-img-top">
                            <img src="{{ asset('storage/images/' . $image->url) }}" class="d-block w-100"
                                alt="{{ $image->name }}">
                        </div> --}}

                        <h5 class="card-title pt-4">Precio: {{ $productos->nombre }}</h5>
                        <p class="card-text">
                            {{ $productos }}
                        </p>
                        <p class="card-text">
                            Estado: {{ $productos }}
                        </p>
                        <p class="card-text">
                            Garantía: {{ $productos }}
                        </p>
                        <p class="card-text">
                            En stock: {{ $productos }}
                        </p>

                        <a href="/store" class="btn btn-outline-primary">Volver atrás</a>

                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
