@extends('layouts.plantilla-base')

@section('content')

<div class="container">

    <h2>Factura</h2>

    <p>
        Cliente:
        {{ $venta->usuario->name }}
    </p>

    <p>
        Fecha:
        {{ $venta->fecha_venta->format('d/m/Y H:i') }}
    </p>

    <p>
        Forma de pago:
        {{ $venta->formaPago->descripcion }}
    </p>

    <hr>

    <!-- tabla de productos -->

</div>

@endsection