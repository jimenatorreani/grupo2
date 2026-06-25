@extends('layouts.plantilla-base')

@section('titulo', 'Productos')

@section('content')
<br>
<h1 class="mb-4">Lista de Productos</h1>

@if(session('exito'))
    <div class="alert alert-success">
        {{ session('exito') }}
    </div>
@endif

<div class="mb-3">
    <a href="{{ route('productos.create') }}"
       class="btn btn-primary">
        Crear Producto
    </a>

    <a href="{{ route('productos.deleted') }}"
       class="btn btn-dark">
        Ver Eliminados
    </a>
</div>

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>ID PRODUCTO</th>
            <th>Nombre</th>
            <th>ID CATEGORÍA</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

    @forelse($productos as $producto)

        <tr>

            <td>{{ $producto->id }}</td>

            <td>{{ $producto->nombre }}</td>

            <td>{{ $producto->categoria->id }}</td>

            <td>{{ $producto->categoria->descripcion }}</td>

            <td>${{ $producto->precio }}</td>

            <td>{{ $producto->stock }}</td>

            <td>
                {{ $producto->activo ? 'Activo' : 'Inactivo' }}
            </td>

            <td>

                <a href="{{ route('productos.show', $producto->id) }}"
                   class="btn btn-info btn-sm">
                    Ver
                </a>

                <a href="{{ route('productos.edit', $producto->id) }}"
                   class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('productos.destroy', $producto->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar producto?')">
                        Eliminar
                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="7">
                No hay productos registrados.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

{{-- código para agregar los links <-- anterior .. 1,2,3 .. siguiente --}}
<div class="d-flex justify-content-center mt-3">
    {{ $productos->links() }}
</div>


<div class="text-center mt-2 mb-4">
    Mostrando {{ $productos->firstItem() }}
    a {{ $productos->lastItem() }}
    de {{ $productos->total() }}
    resultados
</div>


<br><br>
@endsection