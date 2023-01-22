<link href="{{asset('css/burbuja_Login.css') }}" rel="stylesheet">
<link href="{{asset('css/login.css') }}" rel="stylesheet">

@extends("maestra")
@section("titulo")
Registrar
@endsection
@section('contenido')
<body class="Color">
<div class="burbujas">
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    <div class="burbuja"></div>
    
    <div class="wrapper fadeInDown">
    <div class="banner_imga">
                <img src="{{asset('img/3.png') }}" class="d-none d-xl-block" alt="" >
    </div>
        <div id="formContent">
            <h2 id=SignIn class="inactive underlineHover"><a href="{{ route('login') }}">Iniciar Sesión</a></h2>
            <h2 id=SingUp class="active">Registrate</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="Apellido">
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electronico">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">

                <input type="submit" class="fadeIn fourth" value="Registrar">
            </form>
        </div>
    </div>
</div>
</body>

@endsection