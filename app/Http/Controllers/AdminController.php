<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Sólo muestra el panel de administrador si el usuario logueado es un administrador:
    public function dashboard()
    {
        return view('backend.admin.dashboard');
    }
}