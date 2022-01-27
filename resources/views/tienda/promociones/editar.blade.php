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
            <a href="{{route('promociones.reg')}}" class="btn btn-success ms-auto m-2">Nueva Promoción</a>
            
            <a class="btn btn-default btn-primary m-2" href="{{route('promociones.index')}}" >Volver</a>
        </div>
            <div align="center" class="col-md-12">
                <div align="left" class="card" style="width: 75%" >
                    <div class="card-body ">
                      <!-- Custom Text Color Utilities -->
                      <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              
                          </div>
                          <div class="container">
                            <div class="content">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="col-md-4 col-md-offset-4">
                                            <form action="{{route('promociones.update',$promociones->id)}}" method="get">
                                              @csrf
                                                <label for="center">Centro</label>
                                                <select name="center_name" class="form-control">
                                                  @foreach ($centers as $center)
                                                    <option> {{ $center->nombre}}</option>
                                                  @endforeach
                                                </select>
                                                <label for="product">Producto</label>
                                                <select name="product_name" class="form-control">
                                                  @foreach ($products as $product)
                                                    <option>{{$product->nombre}}</option>
                                                  @endforeach
                                                </select>
                                                <label for="date">Precio</label>
                                                <input type="text" class="form-control" name="price">
                                                <label for="month">Mes promoción</label>
                                                <select name="month" class="form-control">
                                                    <option>Enero</option>
                                                    <option>Febrero</option>
                                                    <option>Marzo</option>
                                                    <option>Abril</option>
                                                    <option>Mayo</option>
                                                    <option>Junio</option>
                                                    <option>Julio</option>
                                                    <option>Agosto</option>
                                                    <option>Septiembre</option>
                                                    <option>Octubre</option>
                                                    <option>Noviembre</option>
                                                    <option>Diciembre</option></select>
                                                    
                                                    <button type="submit" class="btn btn-default btn-primary">Guardar</button>
                                                    <p></p>                        
                                               
                                              </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
          
                      </div>
  @endsection