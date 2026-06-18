<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 use Illuminate\Validation\Rule;

class PerfilController extends Controller
{
    public function show()
    {
        return view('backend.perfil.show');
    }

    public function edit()
    {
        return view('backend.perfil.edit');
    }

    public function update(Request $request)
    {
       

        $request->validate([
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore(Auth::id()),
            ],
        ]);

        $user = Auth::user();

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('perfil.show')
            ->with('success', 'Perfil actualizado correctamente.');
    }
}