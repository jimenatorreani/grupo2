@extends('layouts.plantilla-base')

@section('titulo', 'Categorías')

@section('content')
<br>
<h1 class="mb-4">Lista de Categorías</h1>

@if(session('exito'))
    <div class="alert alert-success">
        {{ session('exito') }}
    </div>
@endif

<div class="mb-3">
    <a href="{{ route('categorias.create') }}"
       class="btn btn-primary">
        Crear Categoría
    </a>

    <a href="{{ route('categorias.deleted') }}"
       class="btn btn-dark">
        Ver Eliminadas
    </a>
</div>

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

    @forelse($categorias as $categoria)

        <tr>

            <td>{{ $categoria->id }}</td>

            <td>{{ $categoria->descripcion }}</td>

            <td>

                <a href="{{ route('categorias.show', $categoria->id) }}"
                   class="btn btn-info btn-sm">
                    Ver
                </a>

                <a href="{{ route('categorias.edit', $categoria->id) }}"
                   class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('categorias.destroy', $categoria->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar esta categoría?')">
                        Eliminar
                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="3">
                No hay categorías registradas.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>
<br><br>
@endsection