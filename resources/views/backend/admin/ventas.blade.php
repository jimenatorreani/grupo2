@extends('layouts.plantilla-base')

@section('titulo', 'Ventas')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Ventas</h2>
            <p class="text-muted mb-0">Listado de ventas registradas por los clientes.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Volver al panel</a>
    </div>

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark text-white">
                        <tr>
                            <th>#ID</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Total</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ventas as $venta)
                            <tr>
                                <td>{{ $venta->id }}</td>
                                <td>{{ $venta->usuario->name ?? 'Sin usuario' }}</td>
                                <td>
                                    <span class="badge bg-success">{{ ucfirst($venta->estado) }}</span>
                                </td>
                                <td>$ {{ number_format($venta->total, 2, ',', '.') }}</td>
                                <td>{{ $venta->fecha_venta ? $venta->fecha_venta->format('d/m/Y H:i') : '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No hay ventas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
