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

    <form method="GET" action="{{ route('admin.ventas.index') }}" class="row g-3 align-items-end mb-4">
        <div class="col-md-3">
            <label for="desde" class="form-label">Desde</label>
            <input type="date" class="form-control" id="desde" name="desde" value="{{ request('desde') }}">
        </div>
        <div class="col-md-3">
            <label for="hasta" class="form-label">Hasta</label>
            <input type="date" class="form-control" id="hasta" name="hasta" value="{{ request('hasta') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin.ventas.index') }}" class="btn btn-outline-secondary w-100">Limpiar</a>
        </div>
    </form>

    {{-- Estadísticas de totales --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase small mb-2">Total de ventas</h6>
                    <h3 class="mb-0">$ {{ number_format($totalVentas, 2, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase small mb-2">Cantidad de pedidos</h6>
                    <h3 class="mb-0">{{ $cantidadPedidos }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase small mb-2">Promedio por pedido</h6>
                    <h3 class="mb-0">$ {{ number_format($promedioPorPedido, 2, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-secondary text-white border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase small mb-2">Estados</h6>
                    <div class="small">
                        <strong>Confirmadas:</strong> {{ $ventasConfirmadas }}<br>
                        <strong>Carrito:</strong> {{ $ventasCarrito }}
                    </div>
                </div>
            </div>
        </div>
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
                            <th>Detalle</th>
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
                                <td>
                                    <a href="{{ route('admin.ventas.show', $venta) }}" class="btn btn-sm btn-outline-primary">
                                        Ver detalle
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No hay ventas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- código para agregar los links <-- anterior .. 1,2,3 .. siguiente --}}
<div class="d-flex justify-content-center mt-3">
    {{ $ventas->links() }}
</div>

<div class="text-center mt-2 mb-4">
    Mostrando {{ $ventas->firstItem() }}
    a {{ $ventas->lastItem() }}
    de {{ $ventas->total() }}
    resultados
</div>

@endsection
