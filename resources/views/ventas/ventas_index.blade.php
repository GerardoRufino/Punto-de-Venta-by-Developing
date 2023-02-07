@extends('layouts.admin')

@section('title')
Ventas
@endsection

@section('stylesheet')
<!-- DataTable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="libs/css/">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css') }}">
<link rel="stylesheet" href= "https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endsection

@section('content')
<div class="row justify-content-end ">
    <div class="col-5 text-center">
        <p class="lead d-none d-sm-block d-none d-sm-block">
            Busqueda filtrada por fecha
        </p>
    </div>
</div>
<div class="row justify-content-end">
    <div class="col-7">
        <a class="btn btn-danger" href="#">
            <i class="fas fa-file-pdf mr-2 "></i>
            Generar PDF
        </a>
    </div>
    <div class="col-5">
        <div class="input-daterange datepicker row align-items-center content-end" id="datepicker">
            <div class="col">
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input style="cursor: pointer" class="form-control" placeholder="Fecha de inicio" type="text">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input style="cursor: pointer" class="form-control" placeholder="Fecha final" type="text">
                    </div>
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <a href="#">
                                <i class=" fas fa-search fa-fw"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        @include("notificacion")
        <div class="table-responsive">
            <table id="table_id" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Ticket de venta</th>
                        <th>Detalles</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                    <tr>
                        <td>{{$venta->created_at}}</td>
                        <td>Cliente</td>
                        <td>${{number_format($venta->total, 2)}}</td>
                        <td>
                            <a class="btn btn-info" href="{{route("ventas.ticket", ["id"=>$venta->id])}}">
                                <i class="fa fa-print"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{route("ventas.show", $venta)}}">
                                <i class="fa fa-info"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route("ventas.destroy", [$venta])}}" method="post">
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
<!-- DataPiker -->
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(function() {
        $(" #datepicker").datepicker({});
    });
</script>
@endsection