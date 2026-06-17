@extends('layouts.plantilla-base')

@section('titulo', 'Carrito')

@section('content')

<h2>Mi Carrito</h2>

@if($items->count() > 0)

{{-- Tabla de productos en el carrito --}}
@foreach($items as $item)
    <tr>
        <td>{{ $item->producto->nombre }}</td>
        <td>{{ $item->cantidad }}</td>
        <td>${{ number_format($item->precio_unitario, 2) }}</td>
        <td>${{ number_format($item->subtotal, 2) }}</td>
        <td>
            {{-- Botón eliminar con método DELETE --}}
            <form method="POST" action="{{ route('carrito.eliminar', $item->id) }}">
                @csrf
                @method('DELETE')

                <button type="submit">
                    Eliminar
                </button>
            </form>
        </td>
    </tr>
@endforeach

{{-- Botón confirmar compra --}}
<form method="POST" action="{{ route('carrito.confirmar') }}">
    @csrf

    <button type="submit">
        Confirmar compra
    </button>
</form>
@else

    <p>Aún no se han seleccionado productos.</p>

@endif

@endsection