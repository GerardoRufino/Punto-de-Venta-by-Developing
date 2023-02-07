@section("style")
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="libs/css/">
@endsection
@extends("maestra")
@section("titulo", "Productos")
@section("contenido")
<div class="row">
    <div class="col-12">
        <h1>Productos <i class="fa fa-box"></i></h1>
        <a href="{{route("productos.create")}}" class="btn btn-success mb-2">Agregar</a>
        @include("notificacion")
        <div class="table-responsive">
            <table id="table_id" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código de barras</th>
                        <th>Descripción</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
                        <th>Utilidad</th>
                        <th>Existencia</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{$producto->codigo_barras}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->precio_compra}}</td>
                        <td>{{$producto->precio_venta}}</td>
                        <td>{{$producto->precio_venta - $producto->precio_compra}}</td>
                        <td>{{$producto->existencia}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('productos.edit',[$producto])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('productos.destroy', [$producto])}}" method="post">
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
@section("script")
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