@extends('layouts.plantilla-base')

@section('titulo', 'Usuarios Eliminados')

@section('content')
<br>
<h1 class="mb-4">Usuarios Eliminados</h1>

@if(session('exito'))
    <div class="alert alert-success">
        {{ session('exito') }}
    </div>
@endif

<a href="{{ route('usuarios.index') }}"
   class="btn btn-secondary mb-3">
    Volver
</a>

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

    @forelse($usuarios as $usuario)

        <tr>

            <td>{{ $usuario->id }}</td>

            <td>{{ $usuario->name }}</td>

            <td>{{ $usuario->email }}</td>

            <td>{{ $usuario->rol->nombre }}</td>

            <td>

                <form action="{{ route('usuarios.restore', $usuario->id) }}"
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
            <td colspan="5">
                No hay usuarios eliminados.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>
<br><br><br>
@endsection