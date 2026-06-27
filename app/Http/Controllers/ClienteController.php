<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VentaCabecera;

class ClienteController extends Controller
{
    // Sólo muestra el panel de cliente si el usuario logueado es un cliente
    public function dashboard()
    {
        return view('backend.usuarios.cliente');
    }

    public function misCompras()
{
    $compras = VentaCabecera::with('formaPago')
        ->where('user_id', auth()->id())
        ->where('estado', 'confirmado')
        ->latest('fecha_venta')
        ->paginate(10);

    return view('backend.usuarios.compras', compact('compras'));
}

    public function detalleCompra(VentaCabecera $venta)
    {
        if ($venta->user_id !== auth()->id()) {
            abort(403);
        }

        $venta->load(['usuario', 'detalles.producto', 'formaPago']);

        return view('backend.ventas.detalle', [
            'venta' => $venta,
            'fromAdmin' => false,
        ]);
    }
}