<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" role="button">
                Cerrar Sesión
                <i class="fas fa-sign-out-alt ml-1"></i>
            </a>
        </li>
        @endauth
    </ul>
</nav>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <a class="brand-link ">
                        <!-- <div> -->
                        <img src="{{ asset('img/LogoSM.png') }}" alt="Ad" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <h1 class="brand-text font-weight-light text-dark d-none d-sm-block"><small>{{ config('app.title', 'Laravel')}}</small></h1>
                    </a>
                    <!-- </div> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">@yield('title')</a>
                        </li>
                        <li class="breadcrumb-item active">{{ auth()->user()->roles()->first()->description }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->