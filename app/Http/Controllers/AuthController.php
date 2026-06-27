<?php

//Controlador para el registro, login y logout.

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //es la herramienta que laravel usa para iniciar sesión, cerrar sesión, saber quién está logueado.

class AuthController extends Controller
{
    // Mostrar formulario de registro
    //muestra el formulario de registro para que un usuario lo llene y pueda registrarse con su datos.
    public function formularioRegistro()
    {
        //$roles = Rol::all(); trae los roles existentes en la db. para llenar un <select> en el formulario. No hace falta cuando sólo deseamos registrar clientes

        return view('auth.registro'); //compact('roles') envía los roles a la vista para generar un campo <select> y seleccionar entre los distintos roles.
    }

    // Guardar usuario registrado
    //procesa las entradas del formulario de registro y valida los datos para guardarlos.
    public function registrar(Request $request)
    {
        //(Request $request) recien los datos enviados desde el formulario.
        //Luego validad cada entrada en cada campo.
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Buscar el rol cliente en la base de datos para insertarlo en el registro.
        $rolCliente = Rol::where('nombre', 'cliente')->firstOrFail();

        //inserta un registro
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'rol_id' => $rolCliente->id, //sólo permitira registrar clientes desde el form de registro público.
            //'rol_id' => $request->rol_id, si queremos regustras cualquiera de los dos roles desde el formulario de registro público.
        ]);

        //una vez registrado, redirigé al formulariom login 
        //y muestra una mensaje flash de éxito.
        return redirect()
            ->route('login.form')
            ->with('exito', 'Usuario registrado correctamente.');
    }

    // Mostrar formulario login
    //si el usuario ya está registrado con sus datos en la db, puede iniciar sesion llenando el formulario de login
    public function formularioLogin()
    {
        return view('auth.login');
    }

    // Procesar login
    //éste método valida que lleguen el mail y el usuario
    //y además, autentica usuarios, si un usuario es admin, redirigirá al panel admin.
    //si un usuario es cliente, redirigirá al panel cliente.
    public function autenticar(Request $request)
    {
        //(Request $request) recibe el mail y password ingresado por el usuario en el formulario login.
        //valida los datos
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //inicia sesion si las credenciales estan ok
        if (Auth::attempt($credenciales)) {

            $request->session()->regenerate();

            //y automaticamente redirige al panel segun sea admin o cliente el usuario logueado
            $usuario = Auth::user();
            if ($usuario->rol_id === 1 || optional($usuario->rol)->nombre === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('cliente.dashboard');
        }

        //si los datos ingresados son inválidos vuelve atras y muestra los errores.
        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

