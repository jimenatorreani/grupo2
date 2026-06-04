@extends('layouts.plantilla-base')

@section('content')

<div class="container mt-5">
    <h1 class="mb-3">Medios de Pago</h1>
    <p class="text-muted">Elegí la forma de pago que más te convenga.</p>

    <hr>

    <h4>Métodos disponibles</h4>
    <ul>
        <li>Tarjetas de crédito (Visa, MasterCard, American Express)</li>
        <li>Tarjetas de débito</li>
        <li>Transferencia bancaria</li>
        <li>Billeteras virtuales (Mercado Pago, Ualá)</li>
    </ul>

    <h4>Cuotas</h4>
    <ul>
        <li>Hasta 3 y 6 cuotas sin interés según promociones</li>
        <li>Descuentos en pagos al contado</li>
    </ul>

    <h4>Seguridad</h4>
    <ul>
        <li>Tus datos están protegidos y encriptados</li>
        <li>No almacenamos información de tarjetas</li>
    </ul>

    <h4>Importante</h4>
    <ul>
        <li>El pedido se procesa una vez confirmado el pago</li>
    </ul>

</div>
<br><br>

@endsection