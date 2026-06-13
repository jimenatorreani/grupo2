@extends('layouts.plantilla-base')

@section('titulo', 'Mi carrito')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">Mi carrito</h2>

    @if($items->count() > 0)

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->producto->nombre ?? 'Producto' }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>${{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
                            <td>${{ number_format($item->subtotal, 2, ',', '.') }}</td>
                            <td>
                                <form method="POST" action="{{ route('carrito.eliminar', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">

            <strong>
                Total: ${{ number_format($carrito->total ?? 0, 2, ',', '.') }}
            </strong>

            <form method="POST" action="{{ route('carrito.confirmar') }}">
                @csrf

                <select name="forma_pago_id" class="form-select" required>
                    <option value="">Seleccione una opción</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Transferencia</option>
                </select>

                <button type="submit" class="btn btn-success">
                    Confirmar compra
                </button>
            </form>

        </div>

    @else

        <div class="alert alert-info mb-0">
            Tu carrito está vacío.
        </div>

    @endif

</div>

@endsection