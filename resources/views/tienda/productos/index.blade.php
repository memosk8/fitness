@extends('layouts.tienda')
@section('title', 'Productos')
@section('main-content')
<div class="row">
   <div class="col-12 p-1">
      <h1 class=" text-center bg-dark text-white p-2 ">Productos en existencia</h1>
   </div>
   <br>
   <div class="nav my-2 mx-2 p-1">
      <form action="{{ url('tienda/productos/buscar') }}" method="post">
         <input class="w-auto border-2 p-2" type="search" name="search" placeholder="Buscar productos..." aria-label="Search" required>
      </form>

      <a href="{{ url('tienda/productos/nuevo') }}" class="btn btn-success w-25 ms-auto m-2 ">Registrar producto</a>
   </div>
   <br>
   {{-- {{ $productos[0]->almacen }} --}}
   <div class="col-md-12 m-0 p-0 ">
      <div class="card m-0 " style="width: 100%">
         <div class="card-body p-0 mx-2 ">

            <table class="table table-sortable table-sm m-0 text-center border-1 border-dark p-1" >

               <thead >
                  <tr class="bg-primary bg-opacity-25 " id="header">
                     <th scope="col" class="border-start border-success"><a href="#"># ID</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Nombre</a></th>
                     <th scope="col" class="border-start border-success">Descripción</th>
                     <th scope="col" class="border-start border-success"><a href="#">Precio</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Costo</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Almacen</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Registro</a></th>
                     <th scope="col" class="border-start border-success border-end">Opciones</th>
                  </tr>
               </thead>
               <tbody id="tbody">
                  @foreach ($productos as $producto)
                  <tr>
                     <td class="border-bottom border-1 border-success" >{{ $producto->id }}</th>
                     <td class="border-bottom border-dark">{{ $producto->nombre }}</td>
                     <td class="border-bottom border-dark">{{ $producto->desc }}</td>
                     <td class="border-bottom border-dark">{{ $producto->precio }}</td>
                     <td class="border-bottom border-dark">{{ $producto->costo }}</td>
                     <td class="border-bottom border-dark">{{ $producto->almacen }}</td>
                     <td class="border-bottom border-dark">{{ $producto->created_at }}</td>
                     <td class="border-1 border-success">
                        <form action="{{ route('productos.eliminar', $producto->id) }}" method="post" class="m-1 mx-0">
                           <a href="{{ route('producto.update.form',$producto->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                           &nbsp;
                           &nbsp;
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</a>
                        </form>
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
