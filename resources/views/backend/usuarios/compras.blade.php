@extends('layouts.plantilla-base')

@section('titulo', 'Mis Compras')

@section('content')

<div class="container py-5">
    <a href="{{ route('cliente.dashboard') }}" class="btn btn-secondary">
        Volver
    </a>
    <br><br>

    <h1 class="mb-4">Mis Compras</h1>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Forma de Pago</th>
                <th>Detalle</th>
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
                    <td>
                        <a href="{{ route('cliente.compras.detalle', $compra) }}" class="btn btn-sm btn-outline-primary">
                            Ver detalle
                        </a>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5" class="text-center">
                        Todavía no realizaste compras.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

{{-- código para agregar los links <-- anterior .. 1,2,3 .. siguiente --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $compras->links() }}
    </div>

    <div class="text-center mt-2 mb-4">
        Mostrando {{ $compras->firstItem() }}
        a {{ $compras->lastItem() }}
        de {{ $compras->total() }}
        resultados
    </div>
    <br><br>
@endsection