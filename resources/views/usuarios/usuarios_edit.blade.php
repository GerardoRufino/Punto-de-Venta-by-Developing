
@extends('layouts.admin')
@section('title')
Editar Usuario
@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <form method="POST" action="{{route("usuarios.update", [$usuario])}}">
            @method("PUT")
            @csrf
            <div class="form-group">
                <label class="label">Nombre</label>
                <input required value="{{$usuario->name}}" name="name" class="form-control" type="text" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label class="label">Teléfono</label>
                <input required value="{{$usuario->email}}" name="email" class="form-control" type="text" placeholder="Correo electronico">
            </div>
            <div class="form-group">
                <label class="label">Contraseña</label>
                <input required value="{{$usuario->password}}" name="password" class="form-control" type="password" placeholder="Contraseña">
            </div>
            @include("notificacion")
            <button class="btn btn-success">Guardar</button>
            <a class="btn btn-primary" href="{{route("usuarios.index")}}">Volver</a>
        </form>
    </div>
</div>
@endsection