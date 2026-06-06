@extends('layouts.plantilla-base')

@section('titulo', 'Categorías Eliminadas')

@section('content')

<h1 class="mb-4">
    Categorías Eliminadas
</h1>

@if(session('exito'))
    <div class="alert alert-success">
        {{ session('exito') }}
    </div>
@endif

<a href="{{ route('categorias.index') }}"
   class="btn btn-secondary mb-3">
    Volver
</a>

<table class="table table-bordered">

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

                <form
                    action="{{ route('categorias.restore', $categoria->id) }}"
                    method="POST">

                    @csrf
                    @method('PATCH')

                    <button
                        type="submit"
                        class="btn btn-success btn-sm">
                        Restaurar
                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="3">
                No hay categorías eliminadas.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection