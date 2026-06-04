@extends('layouts.plantilla-base')

@section('content')

<div class="container mt-5">
    <h1 class="mb-3">Envíos</h1>
    <p class="text-muted">Te llevamos tu compra a donde estés.</p>

    <hr>

    <h4>Zonas de envío</h4>
    <ul>
        <li>Realizamos envíos a todo el país</li>
        <li>También podés consultar por envíos locales</li>
    </ul>

    <h4>Tiempos de envío</h4>
    <ul>
        <li>Entre 3 y 7 días hábiles</li>
        <li>Puede variar según la ubicación</li>
    </ul>

    <h4>Costos</h4>
    <ul>
        <li>Se calculan automáticamente al finalizar la compra</li>
        <li>Envío gratis en compras superiores a $XX.XXX</li>
    </ul>

    <h4>Seguimiento</h4>
    <ul>
        <li>Recibirás un código para seguir tu pedido</li>
        <li>Notificaciones por email o WhatsApp</li>
    </ul>

</div>
<br><br>

@endsection