<?php

namespace App\Http\Controllers;

use App\Models\VentaCabecera;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Sólo muestra el panel de administrador si el usuario logueado es un administrador:
    public function dashboard()
    {
        return view('backend.admin.dashboard');
    }

    public function ventas()
    {
        $ventas = VentaCabecera::with('usuario')
            ->latest('fecha_venta')
            ->get();

        return view('backend.admin.ventas', compact('ventas'));
    }
}