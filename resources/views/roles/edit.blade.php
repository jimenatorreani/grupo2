{{-- Formulario o vista que permite editar un registro guardado en la tabla rol --}}

<h1>Editar Rol</h1>

<form action="{{ route('roles.update', $rol->id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $rol->nombre }}">

    <br><br>

    <label>Descripción:</label>
    <input type="text" name="descripcion" value="{{ $rol->descripcion }}">

    <br><br>

    <button type="submit">
        Actualizar
    </button>

</form>