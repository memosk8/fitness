@extends('layouts.tienda')
{{-- {{ print_r($ventas); }} --}}
@section('tabla')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Total</th>
                    <th>Productos</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->fecha }}</td>
                        <td>{{ $venta->Cliente }}</td>
                        <td>{{ $venta->total }}</td>
                       
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
