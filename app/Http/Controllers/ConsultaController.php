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

public function responder(Request $request, Consulta $consulta)
{
    $request->validate([
        'respuesta' => 'required|string|min:3'
    ]);

    $consulta->respuesta = $request->respuesta;
    $consulta->estado = 'respondido';
    $consulta->save();

    return back()->with('success', 'Consulta respondida correctamente');
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
         $pendientes = Consulta::where('estado', 'pendiente')->count();
    $leidos = Consulta::where('estado', 'leido')->count();
    $respondidos = Consulta::where('estado', 'respondido')->count();

    return view('backend.admin.consultas', compact(
        'consultas',
        'pendientes',
        'leidos',
        'respondidos'
    ));

        //return view('backend.admin.consultas', compact('consultas'));
    }

    public function cambiarEstado(Request $request, Consulta $consulta)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,leido,respondido'
        ]);

        $consulta->estado = $request->estado;
        $consulta->save();

        if ($request->wantsJson()) {
            return response()->json(['status' => 'ok', 'estado' => $consulta->estado]);
        }

        return back();
    }
}