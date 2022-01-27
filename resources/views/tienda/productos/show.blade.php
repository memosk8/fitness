@extends('layouts.tienda')
@section('title','Resultados')
@section('main-content')
<div class="row">
   <div class="col-md-12">
      <h1></h1>
   </div>
   <div class="col-md-12">
      <div class="card bg-dark bg-opacity-75" style="width: 100%">
      <div class="row mt-2 ms-2">
         <h2 class=" col-md-3 text-white">Resultados</h2>
         <a href="/tienda/productos/" class=" btn btn-outline-primary col-md-4 m-1 w-25 bg-black bg-opacity-75">Volver atrás</a>
      </div>
         <div class="card-body">

            <div class="col-md-12 m-0 p-0 ">
               <div class="card m-0 " style="width: 100%">
                  <div class="card-body p-0 mx-2 ">

                     <table class="table table-sortable table-sm text-center border-1 border-dark p-1">

                        <thead>
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
                              <td class="border-bottom border-1 border-success">{{ $producto->id }}</th>
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

      </div>
   </div>
</div>
</div>

@endsection