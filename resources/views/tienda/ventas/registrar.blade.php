@extends('layouts.tienda')


@section('main-content')
    <div class="row">
    <div class="col-12 p-1">
        <h1 class=" text-center bg-dark text-white p-2 ">Ventas</h1>
    </div>
    <br>
           <div class="card text-left">
    <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link " href="/tienda/ventas">Tabla</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active " href="/tienda/ventas/registrar">Agregar</a>
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

  <div class="col-md-12 p-3">
            <h1 class=" text-center bg-light p-2 mx-md-5">Formulario</h1>
            <p class=" text-center">Formulario para ingresar los datos a la base de datos de ventas</p>
            <form action="/tienda/ventas/create" method="get">
            <div class="row">
        <div class="col">
                <input name="nombreproducto" type="text" class="form-control" placeholder="Nombre de producto" >
            </div>
        <div class="col">
        <input name="nombrecliente"type="text" class="form-control" placeholder=" Nombre del cliente" aria-label="Last name">
</div>

    
  <div class="col">
    <input name="nombreusuario"type="text" class="form-control" placeholder="Nombre del usuario" aria-label="First name">
  </div>
  <div class="col">
    <input name="fecha"type="text" class="form-control" placeholder="Fecha" aria-label="Last name">
  </div>
   <div class="col">
    <input name="cantidad"type="text" class="form-control" placeholder="Cantidad" aria-label="Cantidad">
  </div>
  


</div>
<div class="col text-center" >
<br>
<button type="submit" class="btn btn-outline-success">Enviar</button>   

</div>
</div>
</form>
  </div>
</div>
        </div>

        </div>
    </div>


        </div>
  @endsection