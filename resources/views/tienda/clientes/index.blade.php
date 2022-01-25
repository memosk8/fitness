@extends('layouts.tienda')
@section('title', 'Clientes')
@section('main-content')


<div class="row">
   <div class="col-12 p-1">
      <h1 class=" text-center bg-dark text-white p-2 ">Clientes registrados</h1>
   </div>
   <br>
   <div class="nav my-2 mx-2 p-1">
      <form action="{{ url('tienda/clientes/buscar') }}" method="post">
         <input class="w-auto border-2 p-2" type="search" name="search" placeholder="Buscar clientes..." aria-label="Search" required>
      </form>

      <a href="{{ url('tienda/clientes/nuevo') }}" class="btn btn-success w-25 ms-auto m-2 ">Registrar cliente</a>
   </div>
   <br>
   {{-- {{ $productos[0]->almacen }} --}}
   <div class="col-md-12 m-0 p-0 ">
      <div class="card m-0 " style="width: 100%">
         <div class="card-body p-0 mx-2 ">

            <table class="table table-sortable table-sm m-0 text-center border-1 border-dark p-1" >

               <thead >
                  <tr class="table-primary" id="header">
                     <th scope="col" class="border-start border-success"><a href="#"># ID</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Nombre</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Cuota</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Apellido paterno</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Apellido materno</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Calle</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Numero interior</a></th>
                     <th scope="col" class="border-start border-success border-end">Numero exterior</th>
                     <th scope="col" class="border-start border-success"><a href="#">Ciudad</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Estado</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">Codigo postal</a></th>
                     <th scope="col" class="border-start border-success"><a href="#">fecha</a></th>
                     <th scope="col" class="border-start">Opciones</th>
                  </tr>
               </thead>
               <tbody id="tbody">
                  @foreach ($clientes as $cliente)
                  <tr>
                     <td class="border-bottom border-1 border-success" >{{ $cliente->id }}</th>
                     <td class="border-bottom border-dark">{{ $cliente->nombre }}</td>
                     <td class="border-bottom border-dark">{{ $cliente->cuota }}</td>
                     <td class="border-bottom border-dark">{{ $cliente->apellidoPaterno }}</td>
                     <td class="border-bottom border-dark">{{ $cliente->apellidoMaterno }}</td>
                     <td class="border-bottom border-dark">{{ $cliente->calle }}</td>
                     <td class="border-bottom border-dark">{{ $cliente->numInt }}</td>
                     <td class="border-bottom border-dark">{{ $cliente->numExt }}</td>
                     <td class="border-bottom border-dark">{{ $cliente->ciudad }}</td>
                     <td class="border-bottom border-dark">{{ $cliente->estado }}</td>
                     <td class="border-bottom border-dark">{{ $cliente->cp }}</td>
                     <td class="border-bottom border-dark">{{ $cliente->created_at}}</td>


                     <td class="border-1 border-success">
                        <form action="{{ route('clientes.eliminar', $cliente->id) }}" method="post" class="m-1 mx-0">
                           <a href="{{ route('cliente.update.form',$cliente->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
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
