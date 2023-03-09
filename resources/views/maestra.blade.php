<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{env("APP_NAME")}}">
    <meta name="author" content="Developing">
    <title>@yield("titulo") - {{env("APP_NAME")}}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/af-2.5.1/date-1.2.0/kt-2.8.0/sb-1.4.0/sp-2.1.0/datatables.min.css" />
    
    <link href="{{url("/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{url("/css/all.min.css")}}" rel="stylesheet">
    @yield("style")
    <style>
        body {
            padding-top: 70px;
            /*Para la barra inferior fija*/
            padding-bottom: 70px;
        }
    </style>
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
                <!-- <button type="button" class="nav-link" data-toggle="modal" data-target="#exampleModal"> -->
                <!-- Corte de Caja -->
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Corte de Caja&nbsp;<i class="fa fa-users"></i></a>
                <!-- </button> -->
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
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Corte de Caja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha:</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="efectivo" class="col-md-4 col-form-label text-md-right">Efectivo:</label>

                            <div class="col-md-6">
                                <input id="efectivo" type="number" step="0.01" class="form-control" name="efectivo" value="{{ old('efectivo') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tarjeta" class="col-md-4 col-form-label text-md-right">Tarjeta:</label>

                            <div class="col-md-6">
                                <input id="tarjeta" type="number" step="0.01" class="form-control" name="tarjeta" value="{{ old('tarjeta') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cheque" class="col-md-4 col-form-label text-md-right">Cheque:</label>

                            <div class="col-md-6">
                                <input id="cheque" type="number" step="0.01" class="form-control" name="cheque" value="{{ old('cheque') }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Realizar Corte de Caja
                                </button>
                            </div>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</body>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <!-- DataTable -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
    
@yield("script")

</html>