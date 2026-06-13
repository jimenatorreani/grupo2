@extends('layouts.plantilla-base')

@section('titulo', 'Comprobante')

@section('content')
<div class="container py-4">

    <h2>Comprobante de Compra</h2>

    <hr>

    <p><strong>N° Venta:</strong> {{ $venta->id }}</p>

    <p>
        <strong>Fecha:</strong>
        {{ $venta->fecha_venta?->format('d/m/Y H:i') }}
    </p>

    <p>
        <strong>Cliente:</strong>
        {{ $venta->usuario->name }}
    </p>
    <p>
    <strong>Forma de Pago:</strong>
    {{ $venta->formaPago->descripcion ?? 'No especificada' }}
    </p>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
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

    <h4 class="text-end">
        Total: ${{ number_format($venta->total,2) }}
    </h4>

</div>
@endsection