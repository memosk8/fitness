@extends('layouts.tienda')

@section('main-content')

<div class="container">
   <div class="row ">
      @if(Session::get('success'))
      <div class="alert-success p-2 m-2 fs-3">{{ Session::get('success')}}</div>
      @endif
      <br>
      <h4 class="card-header bg-light bg-opacity-75 pt-2 mt-2 ">Registro</h4>
      @if(Session::get('fail'))
      <div class="alert-danger">{{ Session::get('fail')}}</div>
      <hr>
      @endif
      <div class="col-md-4 mt-2 ">

         <form action="{{ route('user.create') }}" method="POST">
            @csrf
            <div class="form-group">
               <label class="p-2" for="nombre">Nombre</label>
               <input class="form-control" type="text" name="nombre" value="{{ old('nombre')}}" required>

               @error('nombre')
               <div class="alert-info">Un error con el nombre</div>
               @enderror


            </div>
            <div class="form-group">
               <label class="p-2" for="apellidoPaterno">Apellido Paterno</label>
               <input class="form-control" type="text" name="apellidoPaterno" value="{{ old('apellidoPaterno')}}" required>
            </div>
            <div class="form-group">
               <label class="p-2" for="apellidoMaterno">Apellido Materno</label>
               <input class="form-control" type="text" name="apellidoMaterno" value="{{ old('apellidoMaterno')}}" required>
            </div>

            <div class="form-group">
               <label class="p-2" for="email">Email</label>
               <input type="email" name="email" class="form-control" value="{{ old('email')}}" required>
            </div>
            @error('email')
            <div class="alert-danger p-2 my-3">
               <p>Este correo ya ha sido registrado previamente</p>
            </div>
            <hr>
            @enderror



            <div class="form-group">
               <label class="p-2" for="password">Contraseña</label>
               <input type="password" name="password" class="form-control" required>
            </div>

            <br>

            <div class="form-group">
               <label class="p-2" for="rol">Area de trabajo</label>
               <select name="rol" required>
                  <option value="adm">Administración</option>
                  <option value="profes">Profesores</option>
                  <option value="rh">Recursos Humanos</option>
                  <option value="tienda">Tienda</option>
               </select>
            </div>

            <div class="form-group">
               <label class="p-2" for="centro">Centro</label>
               <select name="centro" required>
                  @foreach($centros as $centro)
                  <option value="{{ $centro->id}}">{{$centro->nombre}}</option>
                  @endforeach
               </select>
            </div>

            <br>
            <div class="form-group">
               <button class="btn btn-block btn-primary" type="submit">Registrar</button>
            </div>
            <br>
            <a href="{{ route('login') }}">Ya eres usuario, ingresa a aqui</a>
         </form>
      </div>
   </div>
</div>


@endsection