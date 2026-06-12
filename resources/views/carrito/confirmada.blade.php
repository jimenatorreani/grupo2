@extends('layouts.plantilla-base')

@section('titulo', 'Compra confirmada')

@section('content')
<div class="container py-5 text-center">
    <h2 class="mb-3">¡Compra confirmada!</h2>
    <p class="lead">Tu pedido fue registrado correctamente.</p>
    <a href="{{ route('cliente.carrito') }}" class="btn btn-primary mt-3">Volver al carrito</a>
</div>
@endsection
