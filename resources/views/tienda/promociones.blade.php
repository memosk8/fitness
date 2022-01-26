@extends('layouts.tienda')

@section('main-content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <div class="row">
        <div class="col-12 p-1">
            <h1 class=" text-center bg-dark text-white p-2 ">Promociones</h1>
        </div>
        <br>
        <div class="nav">
            <p></p>
           <a href="{{route('promociones.reg')}}" class="btn btn-success ms-auto m-2">Nueva Promoción</a>
           
        </div>
        <br>
           <table class="table table-bordered table-sm table-striped text-center">
              <thead>
                    <tr class="bg-primary bg-opacity-25 ">
                                <th scope="col"># ID</th>
                                <th scope="col">Centro</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Mes de Promoción</th>
                                <th scope="col">Fecha Registro</th>
                                <th scope="col"></th>

                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promociones as $promocion)
                                <tr>
                                    <th>{{ $promocion->id }}</th>
                                    <td>{{ $promocion->center_name }}</td>
                                    <td>{{ $promocion->product_name }}</td>
                                    <td>{{ $promocion->price }}</td>
                                    <td>{{ $promocion->month }}</td>
                                    <td>{{ $promocion->created_at }}</td>
                                    
                                    
                                    <td>
                                    <form action="{{ route('promociones.destroy',$promocion->id) }}" method="get">
                                        <button type="submit" class="btn btn-default btn-danger">Eliminar</button>
                                        </form>
                                        <a class="btn btn-default btn-primary m-2" href="{{route('promociones.edit',$promocion->id)}}">Editar</a>
                                        
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