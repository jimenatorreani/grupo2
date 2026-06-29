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

    public function ventas(Request $request)
    {
        $query = VentaCabecera::with('usuario')
            ->latest('fecha_venta');

        if ($request->filled('desde')) {
            $query->whereDate('fecha_venta', '>=', $request->desde);
        }

        if ($request->filled('hasta')) {
            $query->whereDate('fecha_venta', '<=', $request->hasta);
        }

        // Calcular estadísticas antes de paginar
        $totalVentas = (clone $query)->sum('total');
        $cantidadPedidos = (clone $query)->count();
        $promedioPorPedido = $cantidadPedidos > 0 ? $totalVentas / $cantidadPedidos : 0;
        $ventasConfirmadas = (clone $query)->where('estado', 'confirmado')->count();
        $ventasCarrito = (clone $query)->where('estado', 'carrito')->count();

        $ventas = $query->paginate(10)->withQueryString();

        return view('backend.admin.ventas', compact(
            'ventas',
            'totalVentas',
            'cantidadPedidos',
            'promedioPorPedido',
            'ventasConfirmadas',
            'ventasCarrito'
        ));
    }

    public function detalleVenta(VentaCabecera $venta)
    {
        $venta->load(['usuario', 'detalles.producto', 'formaPago']);

        return view('backend.ventas.detalle', [
            'venta' => $venta,
            'fromAdmin' => true,
        ]);
    }
}