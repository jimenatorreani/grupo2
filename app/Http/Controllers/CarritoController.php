<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf; //librería que permite descargar PDF
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComprobanteMail; //importamos los métodos para enviar por mail(??
use App\Models\Producto;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Rol;

use App\Models\VentaCabecera;
use App\Models\VentaDetalle;


class CarritoController extends Controller
{
    // Busca el carrito activo o crea uno nuevo vacío
private function obtenerCarrito()
{
    return VentaCabecera::firstOrCreate(
        [
            'user_id' => auth()->user()->id, // <-- Corregido: sin paréntesis
            'estado' => 'carrito',
        ],
        // Si crea uno nuevo, arranca con total 0
        [
            'total' => 0,
        ]
    );
}

public function index()
{
    $carrito = $this->obtenerCarrito();

    // with('producto') evita N+1: una sola consulta para todos los productos
    $items = $carrito->detalles()
                     ->with('producto')
                     ->get();

    return view('backend.usuarios.carrito', compact('carrito', 'items'));
}
public function agregar(Request $request)
{
    $producto = Producto::findOrFail($request->producto_id);

    $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => 'required|integer|min:1',
    ]);

    $producto = Producto::findOrFail($request->producto_id);

    // Verificar stock antes de agregar
    if ($producto->stock < $request->cantidad) {
        return back()->with('error', 'No hay suficiente stock');
    }

    $carrito = $this->obtenerCarrito();

    // ¿El producto ya está en el carrito?
    $item = $carrito->detalles()
                    ->where('producto_id', $producto->id)
                    ->first();

    if ($item) {
        // Si ya existe: suma la cantidad
        $item->cantidad += $request->cantidad;
        $item->subtotal = $item->cantidad * $item->precio_unitario;
        $item->save();
    } else {
        // Si no existe: crea un nuevo ítem
        $carrito->detalles()->create([
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $producto->precio,
            'subtotal' => $producto->precio * $request->cantidad,
        ]);
    }

    $this->recalcularTotal($carrito);

    return back()->with('success', 'Producto agregado al carrito');
}
public function eliminar(int $id)
{
    $carrito = $this->obtenerCarrito();

    // where('id', $id) evita eliminar ítems de otro carrito
    $carrito->detalles()
            ->where('id', $id)
            ->delete();

    $this->recalcularTotal($carrito);

    return back()->with('success', 'Producto eliminado');
}
public function confirmar(Request $request)
{
    $carrito = $this->obtenerCarrito();

    if ($carrito->detalles()->count() === 0) {
        return back()->with('error', 'Tu carrito está vacío');
    }

    $items = $carrito->detalles()
                     ->with('producto')
                     ->get();

    // Validar forma de pago
    $request->validate([
        'forma_pago_id' => 'required|exists:forma_pagos,id',
    ]);

    // Verificar stock
    foreach ($items as $item) {

        $producto = $item->producto;

        if ($producto->stock < $item->cantidad) {

            return back()->with(
                'error',
                'No hay stock suficiente para '.$producto->nombre
            );
        }
    }

    // Descontar stock
    foreach ($items as $item) {

        $producto = $item->producto;

        $producto->stock -= $item->cantidad;

        $producto->save();
    }

    $total = $carrito->total;

    // Confirmar compra
    $carrito->update([
        'estado' => 'confirmado',
        'fecha_venta' => now(),
        'forma_pago_id' => $request->forma_pago_id,
    ]);

    return redirect()->route('compra.confirmada')
                     ->with('items', $items)
                     ->with('venta_id', $carrito->id)
                     ->with('total', $total);
}

private function recalcularTotal(VentaCabecera $carrito)
 {
    // sum() suma todos los subtotales de los ítems del carrito
    $total = $carrito->detalles()->sum('subtotal');

    $carrito->update([
        'total' => $total,
    ]);
  
}

//VER comprobante
public function descargarComprobante(int $id)
{
    $venta = VentaCabecera::with([
        'usuario',
        'detalles.producto'
    ])->findOrFail($id);

    return view('backend.carrito.comprobante.comprobante', compact('venta'));
}

//DESCARGAR comprobante como PDF
public function descargarPdf(int $id)
{
    $venta = VentaCabecera::with([
        'usuario',
        'detalles.producto',
        'formaPago'
    ])->findOrFail($id);

    $pdf = Pdf::loadView(
     'backend.carrito.comprobante.comprobante-pdf',
      compact('venta')
    );

    return $pdf->download(
        'comprobante_'.$venta->id.'.pdf'
    );
}

//Envía el comprobante por mail
public function enviarComprobante(int $id)
{
    $venta = VentaCabecera::with([
        'usuario',
        'detalles.producto',
        'formaPago'
    ])->findOrFail($id);

    Mail::to($venta->usuario->email)
        ->send(new ComprobanteMail($venta));

    return redirect()-> route ('comprobante.enviado');
    

}

}