<h1>Detalle del Rol</h1>

<p>
    <strong>ID:</strong>
    {{ $rol->id }}
</p>

<p>
    <strong>Nombre:</strong>
    {{ $rol->nombre }}
</p>

<p>
    <strong>Descripción:</strong>
    {{ $rol->descripcion }}
</p>

<br>

<a href="{{ route('roles.index') }}">
    Volver al listado
</a>