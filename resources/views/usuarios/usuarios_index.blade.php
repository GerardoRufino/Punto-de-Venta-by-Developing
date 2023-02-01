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
                            <a class="btn btn-warning" href="#">
                                <i class="fab fa-btc"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('usuarios.edit',[$usuario])}}">
                                <i class="fa fa-edit"></i>
                            </a>
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