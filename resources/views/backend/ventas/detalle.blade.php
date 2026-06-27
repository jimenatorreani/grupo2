@extends('layouts.plantilla-base')

@section('titulo', 'Detalle de compra')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Detalle de compra</h2>
            <p class="text-muted mb-0">Venta #{{ $venta->id }} · {{ $venta->fecha_venta ? $venta->fecha_venta->format('d/m/Y H:i') : '-' }}</p>
        </div>
        <a href="{{ $fromAdmin ? route('admin.ventas.index') : route('cliente.compras') }}" class="btn btn-outline-secondary">
            Volver
        </a>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <strong>Cliente</strong>
                    <div>{{ $venta->usuario->name ?? 'Sin usuario' }}</div>
                </div>
                <div class="col-md-4">
                    <strong>Estado</strong>
                    <div>{{ ucfirst($venta->estado) }}</div>
                </div>
                <div class="col-md-4">
                    <strong>Forma de pago</strong>
                    <div>{{ $venta->formaPago->descripcion ?? 'No especificada' }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark text-white">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($venta->detalles as $detalle)
                            <tr>
                                <td>{{ $detalle->producto->nombre ?? 'Producto eliminado' }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                                <td>${{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                                <td>${{ number_format($detalle->subtotal, 2, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">No hay productos en esta compra.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 text-end">
        <h4 class="mb-0">Total: ${{ number_format($venta->total, 2, ',', '.') }}</h4>
    </div>
</div>
@endsection
