@extends('layouts.tienda')


@section('main-content')

<div class="row">
    <div class="col-12 p-1">
        <h1 class=" text-center bg-dark text-white p-2 ">Ventas</h1>
    </div>
    <br>
    

        
    </div>  
    <div class="card text-left">
    <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="/tienda/ventas">Tabla</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/tienda/ventas/registrar">Agregar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/tienda/ventas/modificar">Modificar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ">Eliminar</a>
      </li>
    
    <li class="nav-item" >
        <form action="{{ url('tienda/productos/buscar') }}" method="post">
        <span data-feather="search"></span>    
        <input class="w-auto border-2 p-2" type="search" name="search" placeholder="Buscar productos..." aria-label="Search" required >
            
            
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
</li>  
</ul>
</diV>
<div class="card-body">
  <table class="table table-bordered table-sm table-striped text-center">

<thead>
    <tr class="bg-info ">
        
        <th scope="col">Fecha</th>
        <th scope="col">Nombre</th>
        <th scope="col">Cliente</th>
        <th scope="col">Usuario</th>
        <th scope="col">Cantidad</th>

    </tr>
</thead>
<tbody id="tbody">
    @foreach($ventas as $venta)
      <tr>
        <td>{{$venta->fecha}}</td>
        <td>{{ $venta->nombreproducto }}</td>
        <td>{{ $venta->nombrecliente }}</td>
        <td>{{ $venta->nombreusuario }}</td>
        <td>{{ $venta->cantidad}}</td>
    @endforeach
    
     

</tbody>
  </div>
</div>
</div>
@endsection