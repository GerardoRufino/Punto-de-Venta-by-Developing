@extends('layouts.admin')

@section('title')
Corte de Caja
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Corte de Caja</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha:</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="efectivo" class="col-md-4 col-form-label text-md-right">Efectivo:</label>

                            <div class="col-md-6">
                                <input id="efectivo" type="number" step="0.01" class="form-control" name="efectivo" value="{{ old('efectivo') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tarjeta" class="col-md-4 col-form-label text-md-right">Tarjeta:</label>

                            <div class="col-md-6">
                                <input id="tarjeta" type="number" step="0.01" class="form-control" name="tarjeta" value="{{ old('tarjeta') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cheque" class="col-md-4 col-form-label text-md-right">Cheque:</label>

                            <div class="col-md-6">
                                <input id="cheque" type="number" step="0.01" class="form-control" name="cheque" value="{{ old('cheque') }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Realizar Corte de Caja
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
