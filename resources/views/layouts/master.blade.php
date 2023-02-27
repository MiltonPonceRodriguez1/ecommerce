<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/3515175.png') }}">
</head>

<body>
    <!-- INICIO DEL MENU DE NAVEGACION -->
    <nav>
        <div class="nav-wrapper blue darken-3">
            <a href="{{route('Product.index')}}" class="brand-logo">Ecommerce</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{route('Home.new')}}"><i class="material-icons left">add_circle_outline</i>Nuevo
                        Producto</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="{{route('Home.new')}}">Nuevo Producto</a></li>
    </ul>
    <!-- FIN DEL MENU DE NAVEGACION  -->
    <div class="content">
        @yield('content')
    </div>

    <script src="{{ asset('js/scripts.js')}}"></script>

    <!-- FOOTER -->
    <footer class="page-footer blue darken-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Milton Ponce Rodriguez</h5>
                    <p class="grey-text text-lighten-4">Ingeniero en Computación, Desarrollador Web, Desarrollador de
                        Software, Desarrollador Backend.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Contacto</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="https://about.milton-dev.com/"
                                target="_blank">Portafolio</a></li>
                        <li>Email: miltonponceipn@gmail.com</li>
                        <li>Celular: 55-52-10-52-57</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container center-align">
                © 2023 Eccomerce - Ponce Milton
            </div>
        </div>
    </footer>
    <!-- FIN FOOTER -->
</body>

</html>
