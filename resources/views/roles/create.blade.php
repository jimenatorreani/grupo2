{{-- Formulario o vista que permite crear un rol --}}
<h1>Crear Rol</h1>

<form action="{{ route('roles.store') }}" method="POST">

    @csrf

    <label>Nombre del rol:</label>
    <input type="text" name="nombre">

    <br><br>

    <label>Descripción:</label>
    <input type="text" name="descripcion">

    <br><br>

    <button type="submit">
        Guardar
    </button>

</form>

{{-- 

    {{ route('roles.store') }} : ENVÍA EL FORMULARIO A LA RUTA /roles con el método post 
    @csrf : Laravel exige token de seguridad en formularios. SIN eso → error 419.
    name="nombre" : El dato viajará como: $request->nombre
    name="descripcion" : El dato viajará como: $request->descripcion

--}}