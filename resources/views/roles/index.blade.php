{{-- Muestra la lista de roles que existe en la base de datos --}}
<h1>Lista de Roles</h1>

{{-- Mensaje flash --}}
@if(session('exito'))
    <p>{{ session('exito') }}</p>
@endif

{{-- Recorre todos los roles --}}
@foreach($roles as $rol)

    <p>
        {{ $rol->nombre }}
    </p>

    <p>
        {{ $rol->descripcion }}
    </p>

    {{-- Link para editar --}}
    <a href="{{ route('roles.edit', $rol->id) }}">
        Editar
    </a>

    {{-- Link para eliminar --}}
    <form action="{{ route('roles.destroy', $rol->id) }}" method="POST">

        @csrf
        @method('DELETE')

        <button type="submit">
            Eliminar
        </button>

    </form>

    <hr>

@endforeach