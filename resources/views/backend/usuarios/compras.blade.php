@extends('layouts.plantilla-base')

@section('titulo', 'Mis Compras')

@section('content')

<div class="container py-5">

    <h1 class="mb-4">Mis Compras</h1>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Forma de Pago</th>
            </tr>
        </thead>

        <tbody>

            @forelse($compras as $compra)

                <tr>
                    <td>{{ $compra->id }}</td>
                    <td>{{ $compra->fecha_venta->format('d/m/Y H:i') }}</td>
                    <td>{{ $compra->estado }}</td>
                    <td>${{ number_format($compra->total, 2) }}</td>
                    <td>{{ $compra->formaPago->descripcion ?? 'No especificada' }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Todavía no realizaste compras.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <a href="{{ route('cliente.dashboard') }}" class="btn btn-secondary">
        Volver
    </a>

</div>

@endsection