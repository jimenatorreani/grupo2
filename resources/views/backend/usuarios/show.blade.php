<h1>Detalle del Usuario</h1>

<p>Nombre: {{ $usuario->name }}</p>

<p>Email: {{ $usuario->email }}</p>

<p>Rol: {{ $usuario->rol->nombre }}</p>

<a href="{{ route('usuarios.index') }}">
    Volver
</a>