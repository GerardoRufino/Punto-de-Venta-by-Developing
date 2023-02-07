<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{env("APP_NAME")}}">
    <meta name="author" content="Developing">
    <title>@yield("titulo") - {{env("APP_NAME")}}</title>
    <link href="{{url("/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{url("/css/all.min.css")}}" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            /*Para la barra inferior fija*/
            padding-bottom: 70px;
        }
    </style>
    @yield("style")
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" target="_blank" href="//parzibyte.me/blog">{{env("APP_TITLE")}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" id="botonMenu" aria-label="Mostrar u ocultar menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mr-auto">
                @guest
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route("home")}}">Inicio&nbsp;<i class="fa fa-home"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("productos.index")}}">Productos&nbsp;<i class="fa fa-box"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Corte de Caja&nbsp;<i class="fa fa-users"></i></a>
                </li>
                @endguest
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item">
                    <a href="{{route("logout")}}" class="nav-link">
                        Salir ({{ Auth::user()->name }})
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    <script type="text/javascript">
        // Tomado de https://parzibyte.me/blog/2019/06/26/menu-responsivo-bootstrap-4-sin-dependencias/
        document.addEventListener("DOMContentLoaded", () => {
            const menu = document.querySelector("#menu"),
                botonMenu = document.querySelector("#botonMenu");
            if (menu) {
                botonMenu.addEventListener("click", () => menu.classList.toggle("show"));
            }
        });
    </script>
    <main class="container-fluid">
        @yield("contenido")
    </main>
    <footer class="px-2 py-2 fixed-bottom bg-dark">
        <span class="text-muted">Punto de venta en Laravel
            <i class="fa fa-code text-white"></i>
            por
            <a class="text-white" href="https://www.facebook.com/profile.php?id=100064063330986&mibextid=LQQJ4d">Developing</a>
            &nbsp;|&nbsp;
        </span>
    </footer>
</body>
@yield("script")

</html>