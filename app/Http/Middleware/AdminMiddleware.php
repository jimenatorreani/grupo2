<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
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
        if (Auth::user()->rol_id !== 1 && Auth::user()->rol?->nombre !== 'admin') {
            abort(403);    // muestra 403 | Forbidden cuando intenta entrar alguien que no tiene permiso.
        }

        //$next($request) permite continuar hacia la ruta.
        return $next($request);
    }
}