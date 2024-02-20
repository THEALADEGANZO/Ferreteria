<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Venta</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px; /* Ajusta según sea necesario */
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>

</head>
<body>
<h1>Detalles de Venta</h1>

<div>
    <h2>Información del Cliente</h2>
    <p><strong>Cliente:</strong> {{ $venta->cliente->nombre }}</p>
    <p><strong>Documento:</strong> {{ $venta->cliente->documento }}</p>
    <!-- Puedes agregar más detalles según tus necesidades -->
</div>

<div>
    <h2>Detalles de Productos</h2>
    <table border="1">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Venta</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($venta->detallesVenta as $detalle)
            <tr>
                <td>{{ $detalle->producto->id }}</td>
                <td>{{ $detalle->producto->nombre }}</td>
                <td>{{ $detalle->cantidad }}</td>
                <td>{{number_format($detalle->producto->precio_venta,2)}}</td>
                <td>{{number_format($detalle->cantidad * $detalle->producto->precio_venta,2)}}</td>
                <!-- Agrega más columnas según tus necesidades -->
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
            <td id="total" class="text-center">{{number_format($venta->subtotal,2)}}</td>
        </tr><tr>
            <td colspan="4" class="text-right"><strong>IGV:</strong></td>
            <td id="total" class="text-center">{{number_format($venta->igv,2)}}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><strong>Monto Total:</strong></td>
            <td id="total" class="text-center">{{number_format($venta->total,2)}}</td>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
