<?php

namespace App\Http\Controllers;

/*Se conecta al modelo 'Rol' porque el controlador necesita 
una forma de trabajar con los datos de la tabla roles.
Y en Laravel, el controlador no habla directamente con la base de datos: 
normalmente habla con el modelo. */
use App\Models\User;
use App\Models\Rol;

use Illuminate\Http\Request;

class UserController
{

    //Mostrar un listado del recurso.
    //Lista o muestra usuarios junto con sus roles, que estan registrados en la DB.
    public function index()
    {
        $usuarios = User::with('rol')->get(); //with('rol') le dice a Laravel: “Además de traer usuarios, traé también sus roles relacionados”.
        return view('backend.usuarios.index', compact('usuarios'));
    }

    

    //Crea un resgistro de usuario y le asigna un rol.
    public function create()
    {
        $roles = Rol::all();  //Trae todos los roles de la tabla roles.ej: id=1 nombre='admin' , id=2 nombre='cliente'
                             //Para qué trae todos los roles? porque al llenar un <select> en el formulario de usuarios.
                            //Poruqe al crear un usuario necesitas elegir en un <select> : 'admin' O 'cliente'  
        
                            
        return view('backend.usuarios.create', compact('roles'));  //redirige a la vista del formulario create              

    }


    //Almacena un registro de usuario recien creado, en la base de datos.
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        'rol_id' => 'required|exists:roles,id',
        ]);

        User::create(
            $request->only(['name', 'email', 'password', 'rol_id'])
        );

        return redirect()->route('usuarios.index')
                        ->with('exito', 'Usuario registrado.');
    }


    //Mostrar el recurso especificado.
    //Mostrar un registro específico.
    //Sirve para ver UN usuario en detalle. No es listado, es un perfil INDIVIDUAL
    public function show(User $usuario)
    {
        return view('backend.usuarios.show', compact('usuario'));
    }

    
    //Muestra el formulario para editar el recurso especificado.
    //Muestra el formulario edit para editar un registro guardado en la DB.
    public function edit(User $usuario) //User $usuario : Route Model Binding.Laravel automáticamente busca el usuario.
    {
        $roles = Rol::all(); //Trae todos los roles para el <select>.

        return view('backend.usuarios.edit', compact('usuario', 'roles')); //redireciona a la vista del formulario edit
                                                                    //compact('usuario', 'roles') envía ambas variables a Blade.
    }


    //Actualiza el recurso especificado en el almacenamiento.
    //Una vez que editó el registro. Lo actualiza, y se guardan nuevamente los datos editados.
    public function update(Request $request, User $usuario)
    {
        $request->validate([
        'name' => 'required|string|max:100',

        'email' => 'required|email|unique:users,email,' . $usuario->id,

        'rol_id' => 'required|exists:roles,id',
        ]);

        $usuario->update(
        $request->only(['name', 'email', 'rol_id'])
        );

        return redirect()->route('usuarios.index')
                     ->with('exito', 'Usuario actualizado.');
    }


    //Elimine el recurso especificado del almacenamiento.
    //Elimina un registro de usuario de la base de datos, en realidad lo esconde.
    public function destroy(User $usuario)
    {
        // Protección 1: No se puede eliminar un usuario admin (rol_id = 1)
        if ($usuario->rol_id == 1) {
            return redirect()->route('usuarios.index')
                            ->with('error', 'No se puede eliminar un usuario administrador. Los administradores son irreemplazables.');
        }

        // Protección 2: No se puede eliminar el usuario actual
        if (auth()->user()->id === $usuario->id) {
            return redirect()->route('usuarios.index')
                            ->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $usuario->delete(); //SoftDelete: setea deleted_at, no borra la fila

        return redirect()->route('usuarios.index')
                        ->with('exito', 'Usuario eliminado correctamente.');
    }


    //Metodo para ver usuarios eliminados
    public function deleted()
    {
        $usuarios = User::onlyTrashed()->get();

        return view('backend.usuarios.deleted', compact('usuarios'));
        //falta proteccion usuario admin
    }


    //Método para restaurar usuarios eliminados
    public function restore(int $id)
    {
        $usuario = User::onlyTrashed()->findOrFail($id);

        if( $usuario->rol_id == 1) { //Si el usuario es admin, no se puede restaurar.
            return redirect()->route('usuarios.index')
                            ->with('error', 'No se puede restaurar un usuario administrador.');
        }

        $usuario->restore();

        return redirect()->route('usuarios.index')
                     ->with('exito', 'Usuario restaurado.');
    }



}

