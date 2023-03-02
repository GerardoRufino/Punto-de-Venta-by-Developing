@include("notificacion")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table id="table_id" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
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
                    </tr>
                @endforeach
                </tbody>
            </table>
    
</body>
</html>