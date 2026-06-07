@extends('layouts.plantilla-base')

@section('titulo', 'Roles Eliminados')

@section('content')

<br>

<h1 class="mb-4">Roles Eliminados</h1>

@if(session('exito'))
    <div class="alert alert-success">
        {{ session('exito') }}
    </div>
@endif

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acción</th>
        </tr>
    </thead>

    <tbody>

    @forelse($roles as $rol)

        <tr>

            <td>{{ $rol->id }}</td>

            <td>{{ $rol->nombre }}</td>

            <td>{{ $rol->descripcion }}</td>

            <td>

                <form action="{{ route('roles.restore', $rol->id) }}"
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
            <td colspan="4">
                No hay roles eliminados.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

<br>

<a href="{{ route('roles.index') }}"
   class="btn btn-secondary">
    Volver
</a>
<br><br>
@endsection