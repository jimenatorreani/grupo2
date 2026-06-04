@extends('layouts.plantilla-base')

@section('content')

<div class="container mt-5">
    <h1 class="mb-3">Formas de Entrega</h1>
    <p class="text-muted">Elegí cómo querés recibir tu pedido.</p>

    <hr>

    <h4>Entrega a domicilio</h4>
    <ul>
        <li>Recibí tu pedido en la puerta de tu casa</li>
        <li>Horarios de entrega según el correo</li>
    </ul>

    <h4>Retiro en punto</h4>
    <ul>
        <li>Podés retirar tu compra en nuestro local</li>
        <li>Días y horarios de atención disponibles</li>
    </ul>

    <h4>Intentos de entrega</h4>
    <ul>
        <li>El correo realizará hasta 2 intentos de entrega</li>
        <li>Si no se concreta, el pedido vuelve a sucursal</li>
    </ul>

    <h4>Recomendaciones</h4>
    <ul>
        <li>Revisá el paquete al momento de recibirlo</li>
        <li>Ante cualquier problema, comunicate con nosotros</li>
    </ul>

</div>
<br><br>

@endsection