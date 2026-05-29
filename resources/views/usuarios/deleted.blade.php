<h1>Usuarios eliminados</h1>

@foreach($usuarios as $usuario)

    <p>{{ $usuario->name }}</p>

    <form action="{{ route('usuarios.restore', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <button type="submit">Restaurar</button>
    </form>

    <hr>

@endforeach