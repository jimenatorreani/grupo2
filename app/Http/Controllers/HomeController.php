<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class HomeController extends Controller
{
    public function index()
    {
        $destacados = Producto::where('activo', true)
                              ->inRandomOrder()
                              ->take(16)
                              ->get();

        return view(
            'frontend.principal',
            compact('destacados')
        );
    }
}