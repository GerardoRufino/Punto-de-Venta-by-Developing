@extends('layouts.admin')

@section('title')
Productos en Stock
@endsection

@section('stylesheet')
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
            <table id="table_id" class="table table-bordered display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Código de barras</th>
                        <th>Descripción</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
                        <th>Utilidad</th>
                        <th>Existencia</th>
                        <th>Provedor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{$producto->codigo_barras}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>$ {{$producto->precio_compra}}</td>
                        <td>$ {{$producto->precio_venta}}</td>
                        <td>$ {{$producto->precio_venta - $producto->precio_compra}}</td>
                        <td>{{$producto->existencia}} pzas</td>
                        <td>Provedor</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            responsive: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
<!-- DataPiker -->
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(function() {
        $(" #datepicker").datepicker({});
    });
</script>
@endsection