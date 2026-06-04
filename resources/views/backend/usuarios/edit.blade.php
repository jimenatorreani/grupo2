<h1>Editar Usuario</h1>

<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="name" value="{{ $usuario->name }}"> {{-- value="{{ $usuario->name }}" Precarga el nombre actual.Entonces si el usuario es:Jimena, el input ya aparece completo. --}}

    <br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $usuario->email }}"> {{-- value="{{ $usuario->email }}" lo mismo de arriba sucede con email --}}

    <br><br>

    <label>Rol:</label>

    <select name="rol_id">

        @foreach($roles as $rol)

            <option value="{{ $rol->id }}"
                {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>

                {{ $rol->nombre }}

            </option>

        @endforeach

    </select>

    <br><br>

    <button type="submit">
        Actualizar
    </button>

</form>