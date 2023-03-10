@extends('layouts.admin')

@section('title')
Productos
@endsection

@section ('content')

<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModalA">
    Agregar
</button>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="table_id" class="table table-bordered display nowrap">
                <thead>
                    <tr>
                        <th>Código de barras</th>
                        <th>Descripción</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
                        <th>Existencia</th>
                        <th>Detalles</th>
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
                        <td>{{$producto->existencia}}</td>
                        <td>
                            <a class="btn btn-info" href="">
                                <i class="fa fa-info"></i>
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalE" data-id="{{ $producto->id }}}">
                                <i class=" fa fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <form id="eliminar" action="{{route('productos.destroy', [$producto])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" id="alert" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Agregar producto-->
        <div class="modal fade" id="exampleModalA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{route("productos.store")}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="label">Código de barras</label>
                                        <input required autocomplete="off" name="codigo_barras" class="form-control" type="text" placeholder="Código de barras">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Descripción</label>
                                        <input required autocomplete="off" name="descripcion" class="form-control" type="text" placeholder="Descripción">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Precio de compra</label>
                                        <input required autocomplete="off" name="precio_compra" class="form-control" type="decimal(9,2)" placeholder="Precio de compra">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Precio de venta</label>
                                        <input required autocomplete="off" name="precio_venta" class="form-control" type="decimal(9,2)" placeholder="Precio de venta">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Existencia</label>
                                        <input required autocomplete="off" name="existencia" class="form-control" type="decimal(9,2)" placeholder="Existencia">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Imagen</label>
                                        <input type="file" autocomplete="off" name="imagen" class="form-control" type="decimal(9,2)" placeholder="Imagen">
                                    </div>
                                    <button class="btn btn-success">Guardar</button>
                                    <a class="btn btn-danger" href="{{route("productos.index")}}">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Editar Producto-->

    </div>
    @endsection


    @section("script")
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                responsive: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
            });
        });
    </script>

    

    @endsection