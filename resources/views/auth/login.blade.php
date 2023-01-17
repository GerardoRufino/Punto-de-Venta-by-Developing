<link href="{{asset('css/burbuja_Login.css') }}" rel="stylesheet">
<link href="{{asset('css/login.css') }}" rel="stylesheet">

@extends('maestra')
@section("titulo")
Login
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
    <div class="banner_img">
        <img src="{{asset('img/3.png') }}" alt="" >
    </div>
        <div id="formContent">
            <h2 id=SignIn class="active">Iniciar Sesión</h2>
            <h2 id=SingUp class="inactive underlineHover"><a href="{{ route('register') }}">Registrate</a></h2>
            <div class="fadeIn first">
                <img src="{{asset('img/user.png') }}" id="icon" alt="User Icon">
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electronico">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Recordarme
                    </label>
                </div>
                <input type="submit" class="fadeIn fourth" value="Iniciar Sesión">
            </form>

            @if (Route::has('password.request'))
            <a class="underlineHover" href="{{ route('password.request') }}">Forgot Password?</a>
            @endif
        
        </div>
        
    </div>
</div>  
</body>

@endsection