@extends('layouts.plantilla-base')

@section('titulo', 'Productos Eliminados')

@section('content')
<br><br>
<h1>Productos Eliminados</h1>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acción</th>
        </tr>
    </thead>

    <tbody>

    @forelse($productos as $producto)

        <tr>

            <td>{{ $producto->id }}</td>

            <td>{{ $producto->nombre }}</td>

            <td>

                <form action="{{ route('productos.restore', $producto->id) }}"
                      method="POST">

                    @csrf
                    @method('PATCH')

                    <button type="submit"
                            class="btn btn-success btn-sm">
                        Restaurar
                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="3">
                No hay productos eliminados.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>
<br><br>
@endsection