<?php

namespace App\Http\Controllers;

use App\Models\Rol; /*Se conecta al modelo 'Rol' porque el controlador necesita 
                    una forma de trabajar con los datos de la tabla roles.
                    Y en Laravel, el controlador no habla directamente con la base de datos: 
                    normalmente habla con el modelo. */

use Illuminate\Http\Request;

class RolController
{
    /* Este método normalmente: 
        -obtiene todos los roles,
        -los manda a una vista
    */
    public function index()
    {
        $roles = Rol::all(); //usa Eloquent para traer TODOS los registros de la tabla roles.

         //Esto ya no devuelve JSON/texto.
        return view('roles.index', compact('roles')); 
                                                     //Ahora los datos se muestran en HTML mediante Blade.
                                                     //ya entra al flujo real MVC.

    }

    //Éste método muestra el formulario para crear un nuevo rol.
    //Cuando entramos a la ruta de crear roles, muestra la vista "roles/formulario-create.blade.php”.
    public function create()
    {
        return view('roles.create');

    }


    //Almacena un recurso recién creado en el almacenamiento(BD). recibe datos y guarda en DB
    //Este método es el que realmente guarda el rol en la base de datos.
    public function store(Request $request) //$request contiene TODOS los datos enviados desde el formulario.
    {
        //Esto le dice a Laravel: “Antes de guardar, verificá que los datos sean válidos”
        $request->validate([
        'nombre' => 'required|string|max:50|unique:roles', //obligatorio|debe ser texto|max 50 caracteres|no puede repetirse en la tabla roles
        'descripcion' => 'nullable|string|max:255', //puede venir vacío|debe ser texto|max 255 caracteres.
        ]);

        //crear el registro.
        //only() solo toma esos campos del registro y evita guardar accidentalemnte otros campos como tokens, campos ocultos, datos inesperados.
        Rol::create($request->only(['nombre', 'descripcion']));

        //Despues de guardar los datos, REDIRECIONA A '/roles' y
        //guarda temporalemte un mensaje de session por ejmplo: 'rol' si el registro se creo con éxito
        //sino mostrara: error, actualizado, etc.. 
        return redirect()->route('roles.index')
                     ->with('exito', 'Rol creado.');
    }

    
    //Mostrar el recurso especificado.
    public function show(string $id)
    {
        //
    }

    //Muestra el formulario para editar el recurso especificado.
    public function edit(string $id)
    {
        $rol = Rol::findOrFail($id); //findOrFail Busca un rol por ID. ej: /roles/1/edit

        return view('roles.edit', compact('rol'));
    }


    //Actualiza el recurso especificado en el almacenamiento.
    public function update(Request $request, string $id)
    {
        $request->validate([
        'nombre' => 'required|string|max:50|unique:roles,nombre,' . $id, //El nombre debe ser único… EXCEPTO el rol actual, ej:si es 'admin' no podes volver a poner admi en el campo nombre
        'descripcion' => 'nullable|string|max:255',
    ]);

    $rol = Rol::findOrFail($id);

    $rol->update($request->only(['nombre', 'descripcion'])); //Actualiza datos.

    return redirect()->route('roles.index')
                     ->with('exito', 'Rol actualizado.'); //mensaje flash.
    }

    
    //Elimine el recurso especificado del almacenamiento.
    //eliminación lógica (SoftDeletes)
    //El rol desaparece del listado pero no se borra fisicamente de la DB.
    public function destroy(Rol $rol)
    {
        $rol->delete(); // SoftDelete: setea deleted_at, no borra la fila
        return redirect()->route('roles.index')->with('exito', 'Rol eliminado.');
    }
}
