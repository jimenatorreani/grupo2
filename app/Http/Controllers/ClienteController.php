<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //Sólo muestra el panel de cliente si el usuario logueado es un cliente:
    public function dashboard()
    {
        return view('backend.usuarios.cliente');
    }
}
