<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    public function show()
    {
        return view('frontend.consultas');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string|min:5'
        ]);

        Consulta::create($validated);

        return redirect('/consultas')
            ->with('success', '¡Consulta enviada correctamente!');
    }

    public function index()
    {
        $consultas = Consulta::latest()->get();

        return view('backend.admin.consultas', compact('consultas'));
    }
}