@extends('layouts.tienda')
@section('userName')
<a class="nav-link fw-bold" href="{{ route('user.session') }}">
   <span data-feather="user" class="border-1">
      </span>
      {{ $data->nombre }}
</a>
@endsection

@section('main-content')
<div class="container p-4  m-1 bg-white bg-opacity-25">
   <div class="row">
      <div class="col-md-6 col-md-offset">
         <h3 class="bg-primary bg-opacity-25 p-3">Sesión de usuario</h3>
         <table class="table table-hover bg-white">
            <thead>
               <th>Nombre</th>
               <th>Email</th>
            </thead>
            <tbody>
               <tr>
                  <td>{{ $data->nombre}}</td>
                  <td>{{ $data->email}}</td>
                  <td><a class="link-danger" href="{{ route('logout')}}">Cerrar sesión</a></td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>


@endsection