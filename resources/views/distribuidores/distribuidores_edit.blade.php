@extends('layouts.admin')

@section('title')
Editar Provedor
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <form method="POST" action="{{route("distribuidores.update", [$distribuidor])}}">
            @method("PUT")
            @csrf
            <div class="form-group">
                <label class="label">Nombre</label>
                <input required value="{{$distribuidor->nombre}}" name="nombre" class="form-control" type="text" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label class="label">Teléfono</label>
                <input required value="{{$distribuidor->telefono}}" name="telefono" class="form-control" type="text" placeholder="Teléfono">
            </div>
            <div class="form-group">
                <label class="label">Dirección</label>
                <input required value="{{$distribuidor->direccion}}" name="direccion" class="form-control" type="text" placeholder="Dirección">
            </div>
            <div class="form-group">
                <label class="label">Ciudad</label>
                <input required value="{{$distribuidor->ciudad}}" name="ciudad" class="form-control" type="text" placeholder="Ciudad">
            </div>

            @include("notificacion")
            <button class="btn btn-success">Guardar</button>
            <a class="btn btn-primary" href="{{route("distribuidores.index")}}">Volver</a>
        </form>
    </div>
</div>
@endsection