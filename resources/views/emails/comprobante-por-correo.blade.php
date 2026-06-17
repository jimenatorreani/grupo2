<h2>Gracias por su compra</h2>

<p>
    Hola {{ $venta->usuario->name }}.
</p>

<p>
    Su compra fue registrada correctamente.
</p>

<p>
    Número de compra: {{ $venta->id }}
</p>

<p>
    Total: ${{ number_format($venta->total,2) }}
</p>

<p>
    Forma de pago:
    {{ $venta->formaPago->descripcion ?? 'No especificada' }}
</p>

<p>
    Se adjunta el comprobante en PDF.
</p>