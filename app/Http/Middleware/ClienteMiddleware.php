<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClienteMiddleware
{
    //Gestionar una solicitud entrante.
    public function handle(Request $request, Closure $next): Response
    {
        //auth()->check() verfica que exista un usuario logueado. Devuelve TRUE si inicio sesión, o FALSE si no lo hizo.
        if (!Auth::check()) {
            return redirect('/login');
        }

        //auth()->user() obtiene el usuario actual, por ejemplo: Maria
        //rol->nombre obtiene el rol asociado, por ejemplo: cliente.
        if (Auth::user()->rol?->nombre !== 'cliente') {
            abort(403); // muestra 403 | Forbidden cuando intenta entrar alguien que no tiene permiso.
        }

        //$next($request) permite continuar hacia la ruta.
        return $next($request);
    }
}
