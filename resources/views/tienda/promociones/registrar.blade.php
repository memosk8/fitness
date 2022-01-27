@extends('layouts.tienda')
<title>Promociones</title>

@section('main-content')

<div class="row">
  <div class="col-12 p-1">
      <h1 class=" text-center bg-dark text-dark p-2 ">A</h1>
  </div>
  <br>
  <div class="nav">
   
  </div>
  <br>

  <div align="center" class="col-md-12">
      <div align="left" class="card" style="width: 40%">
          <div class="card-body ">
            <!-- Custom Text Color Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nueva Promoción</h6>
                </div>
                <div class="container">
                  <div class="content">
                      <div class="panel panel-default">
                          <div class="panel-body">
                              <div class="col-md-4 col-md-offset-4">
                                  <form action="{{route('promociones.create')}}" method="get">
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
                                    </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

            </div>
       
@endsection

          
        </main>
      </div>
    </div>

   
  </body>
</html>