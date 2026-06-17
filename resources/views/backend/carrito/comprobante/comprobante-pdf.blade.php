<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Comprobante</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h1 {
            text-align: center;
        }

        table {
            width:100%;
            border-collapse: collapse;
        }

        table, th, td {
            border:1px solid black;
        }

        th, td {
            padding:8px;
        }

        .total {
            text-align:right;
            margin-top:20px;
        }
    </style>
</head>

<body>

<h1>SportXpress</h1>

<h2>Comprobante de Compra</h2>

<p><strong>N° Venta:</strong> {{ $venta->id }}</p>

<p><strong>Cliente:</strong> {{ $venta->usuario->name }}</p>

<p><strong>Fecha:</strong>
{{ $venta->fecha_venta?->format('d/m/Y H:i') }}
</p>

<p><strong>Forma de pago:</strong>
{{ $venta->formaPago->descripcion }}
</p>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
        @foreach($venta->detalles as $detalle)
            <tr>
                <td>{{ $detalle->producto->nombre }}</td>
                <td>{{ $detalle->cantidad }}</td>
                <td>${{ number_format($detalle->precio_unitario,2) }}</td>
                <td>${{ number_format($detalle->subtotal,2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h3 class="total">
    Total: ${{ number_format($venta->total,2) }}
</h3>

</body>
</html>