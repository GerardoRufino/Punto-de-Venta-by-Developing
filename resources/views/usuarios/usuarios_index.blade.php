@extends('layouts.admin')

@section('title')
Empleados
@endsection

@section('stylesheet')
<!-- DataTable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection

@section('content')
<div class="row justify-content-start mb-3">
    <div class="col-7">
        <a class="btn btn-danger" href="#">
            <i class="fas fa-file-pdf mr-2"></i>
            Generar PDF
        </a>
    </div>
</div>


<div class="row">
    <div class="col-12">
        @include("notificacion")
        <div class="table-responsive">
            <table id="table_id" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo Electronico</th>
                        <th>Rol</th>
                        <th>Accesos</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->lastname}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->role}}</td>
                        <td>
                            <a class="btn btn-success" href="#">
                                <i class="fas fa-users"></i>
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-edit"></i>
                            </button>
                            <!-- <a class="btn btn-warning" href="{{route('usuarios.edit',[$usuario])}}">
                                <i class="fa fa-edit"></i>
                            </a> -->
                        </td>
                        <td>
                            <form action="{{route('usuarios.destroy', [$usuario])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<!-- DataTable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>

@endsection