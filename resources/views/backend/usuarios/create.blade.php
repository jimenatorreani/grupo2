<h1>Crear Usuario</h1>

{{-- Formulario Create: crea un registro de usuario --}}

<form action="{{ route('usuarios.store') }}" method="POST">

    @csrf

    <label>Nombre:</label>
    <input type="text" name="name">

    <br><br>

    <label>Email:</label>
    <input type="email" name="email">

    <br><br>

    <label>Password:</label>
    <input type="password" name="password">

    <br><br>

    <label>Confirmar Password:</label>
    <input type="password" name="password_confirmation">

    <br><br>

    <label>Rol:</label>

    <select name="rol_id"> {{-- name="rol_id" hace que viaje: $request->rol_id --}}

        @foreach($roles as $rol)

            <option value="{{ $rol->id }}"> {{-- option value="" guarda el id del rol --}}
                {{ $rol->nombre }}
            </option>

        @endforeach

    </select>

    <br><br>

    <button type="submit">
        Guardar
    </button>

</form>