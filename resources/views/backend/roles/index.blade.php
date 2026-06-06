@extends('layouts.plantilla-base')

@section('titulo', 'Roles')

@section('content')

<h1 class="mb-4">Lista de Roles</h1>

@if(session('exito')) <div class="alert alert-success">
{{ session('exito') }} </div>
@endif

<div class="mb-3">
    <a href="{{ route('roles.create') }}" class="btn btn-primary">
        Crear Rol
    </a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th width="250">Acciones</th>
        </tr>
    </thead>


<tbody>
    @forelse($roles as $rol)
        <tr>
            <td>{{ $rol->nombre }}</td>
            <td>{{ $rol->descripcion }}</td>

            <td>
                <a href="{{ route('roles.show', $rol->id) }}"
                   class="btn btn-info btn-sm">
                    Ver
                </a>

                <a href="{{ route('roles.edit', $rol->id) }}"
                   class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('roles.destroy', $rol->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar este rol?')">
                        Eliminar
                    </button>

                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">
                No hay roles registrados.
            </td>
        </tr>
    @endforelse
</tbody>
</table>

@endsection
