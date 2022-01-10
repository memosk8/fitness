<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="Guillermo López">

    <title>Fitness Salud - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="bg-light bg-opacity-50">
    <nav class="nav navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 m-1 rounded-pill">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 m-2 text-md-center text-uppercase" href="#">Fitness Salud</a>
        <div class="nav-item">
            <a class="nav-link" href="{{ url('/tienda/ventas') }}">
                <span data-feather="file"></span>
                Ventas
            </a>
        </div>

        <div>
            <a class="nav-link" href="{{ url('/tienda/productos') }}">
                <span data-feather="shopping-cart"></span>
                Productos
            </a>
        </div>
        <div>
            <a class="nav-link" href="{{ url('/tienda/clientes') }}">
                <span data-feather="users"></span>
                Clientes
            </a>
        </div>
        <div>

        </div>

        <input class="form-control form-control-dark w-25 text-center nav-item" type="text" placeholder="Buscar . . ."
            aria-label="Search">

        <a class="nav-link" href="#">Salir</a>


    </nav>

    <main class="container-fluid">

        @yield('main-content')

    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    {{-- <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script> --}}
</body>

</html>
