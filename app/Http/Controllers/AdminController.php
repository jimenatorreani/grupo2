<?php

namespace App\Http\Controllers;

use App\Models\VentaCabecera;
use Illuminate\Http\Request;

use App\Models\Rol;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Producto;

class AdminController extends Controller
{
    //Sólo muestra el panel de administrador si el usuario logueado es un administrador:
    public function dashboard()
    {
        $totalUsuarios = User::count();

        $totalProductos = Producto::count();

        $totalPedidos = VentaCabecera::where('estado', 'confirmado')
            ->count();
          
        $totalVentas = VentaCabecera::where('estado', 'confirmado')
        ->sum('total');    

        return view(
            'backend.admin.dashboard',
            compact(
                'totalUsuarios',
                'totalProductos',
                'totalPedidos',
                'totalVentas'
            )
        );
    }

    public function ventas()
    {
        $ventas = VentaCabecera::with('usuario')
            ->latest('fecha_venta')
            ->paginate(10);

        return view('backend.admin.ventas', compact('ventas'));
    }
}