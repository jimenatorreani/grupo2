<h1>Lista de Usuarios</h1>

{{-- Mensaje flash 'usuarios creado con exitos, actualizado, eliminado, etc --}}
@if(session('exito'))
    <p>{{ session('exito') }}</p>
@endif

{{-- Lista los usuarios con sus roles asignados que estan registrados en la base de datos --}}

@foreach($usuarios as $usuario)

    <p>Nombre: {{ $usuario->name }}</p>

    <p>Email: {{ $usuario->email }}</p>

    <p>Rol: {{ $usuario->rol->nombre }}</p>

    <a href="{{ route('usuarios.show', $usuario->id) }}">
        Ver {{-- Ver en detalle los datos de un registro de un usuario--}}
    </a>

    <a href="{{ route('usuarios.edit', $usuario->id) }}">
        Editar {{-- Editar los datos de un registro de un usuario--}}
    </a>

    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">

    @csrf
    @method('DELETE')

    <button type="submit">
        Eliminar {{-- Eliminar  un registro de un usuario--}}
    </button>

    </form>

    <a href="{{ route('usuarios.deleted') }}">
        Ver usuarios eliminados 
    </a>

    <hr>

@endforeach