<!doctype html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <meta name="description" content="">
   <meta name="author" content="Guillermo López">
   <title>Fitness Salud - @yield('title')</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
   <link rel="stylesheet" href="../css/table.css">
   <script src="../js/index.js" defer></script>
</head>

<body class="bg-dark bg-opacity-25 mb-5">

   <nav class="navbar navbar-light sticky-top navbar-expand-md bg-light text-white ">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0 m-2 text-md-center text-uppercase bg-light bg-opacity-25" href="{{ route('tiendaHome') }}">Fitness Salud</a>
      <ul class="navbar-nav text-center ms-auto  bg-opacity-25 ">
         <li class="nav-item">
            <a class="nav-link" href="{{ url('/tienda/ventas') }}">
               <span data-feather="dollar-sign"></span>
               Ventas
            </a>
         </li>

         <li class="px-3">
            <a class="nav-link" href="{{ url('/tienda/productos') }}">
               <span data-feather="shopping-cart" class="border-1 border-dark"></span>
               Almacén
            </a>
         </li>
         <li>
            <a class="nav-link " href="{{ url('/tienda/clientes') }}">
               <span data-feather="users" class="border-1"></span>
               Clientes
            </a>
         </li>
         <li>
            <a class=" " href="{{ $LoggedUserInfo['nombre'] }}">
            </a>
         </li>
      </ul>


      {{-- <a class="nav-link" href="#">Salir</a> --}}


   </nav>

   <main class="container-fluid">

      @yield('main-content')

      
   </main>

   <!-- Bootstrap core JavaScript
    ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
   </script>
   <script>
      window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
   </script>
   <!-- 
        <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
     -->


   <!-- Icons -->
   <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
   <script>
      feather.replace()
   </script>

</body>

</html>