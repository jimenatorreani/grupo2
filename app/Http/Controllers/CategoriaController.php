<?php

namespace App\Http\Controllers;
use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all(); //usa Eloquent para traer TODOS los registros de la tabla categorias
        //Esto ya no devuelve JSON/texto.
        return view('backend.categorias.index', compact('categorias')); 
                                                     //Ahora los datos se muestran en HTML mediante Blade.
                                                     //ya entra al flujo real MVC.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categorias.create');
    }

    //Almacena un recurso recién creado en el almacenamiento(BD). Recibe datos y guarda en DB
    //Este método es el que realmente guarda la categoria en la base de datos.
    public function store(Request $request) //$request contiene TODOS los datos enviados desde el formulario.
    {
        //Esto le dice a Laravel: “Antes de guardar, verificá que los datos sean válidos”
        $request->validate([
        'descripcion' => 'required|string|max:255|unique:categorias,descripcion', //obligatorio|debe ser texto|max 50 caracteres|no puede repetirse en la tabla categorias
        ]);

        //crear el registro.
        Categoria::create([
        'descripcion' => $request->descripcion,
        ]);

        //Despues de guardar los datos, REDIRECIONA A '/categorias' y
        //guarda temporalemte un mensaje de session por ejmplo: 'categpria guardada' si el registro se creo con éxito
        //sino mostrara: error, actualizado, etc.. 
        return redirect()->route('categorias.index')
                     ->with('exito', 'Categoria creada correctamente.');
    }

    //Muestra una categoría específica
    public function show(Categoria  $categoria)
    {
          return view('backend.categorias.show', compact('categoria'));
    }

    //Edita una categoria
    public function edit(Categoria  $categoria)
    {
        return view('backend.categorias.edit', compact('categoria'));    
    }

    //actualiza en db. la categoría que fue editada.
    public function update(Request $request, Categoria $categoria)
    {
         $request->validate([
        'descripcion' => 'required|string|max:255|unique:categorias,descripcion,' . $categoria->id,
        ]);

        $categoria->update(['descripcion' => $request->descripcion,]); //Actualiza datos.

        return redirect()->route('categorias.index')
                     ->with('exito', 'Categoría actualizada correctamente.'); //mensaje flash.
    }

    //Elimina logicamente un registro de categoria de la tabla categorias
    public function destroy(Categoria $categoria)
    {
         $categoria->delete(); // SoftDelete: setea deleted_at, no borra la fila
        return redirect()->route('categorias.index')->with('exito', 'Categoria eliminada correctamente.');
    }

    //Metodo para ver categorias eliminadas
    public function deleted()
    {
        $categorias = Categoria::onlyTrashed()->get();

        return view('backend.categorias.deleted', compact('categorias'));
    }

    public function restore(int $id)
    {
        $categoria = Categoria::withTrashed()->findOrFail($id);

        $categoria->restore();

        return redirect()
            ->route('categorias.index')
            ->with('exito', 'Categoría restaurada correctamente.');
    }
}
