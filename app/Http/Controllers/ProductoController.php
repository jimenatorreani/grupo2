<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //Lista los productos junto con su categorías, que están registrados en la base de datos.
    public function index()
    {
        $productos = Producto::with('categoria')->get(); //with('categoria') le dice a Laravel: “Además de traer productos, traé también sus categorias relacionadas”.
        return view('backend.productos.index', compact('productos'));
    }

    //Crea un registro de un producto junto con su categoria asociada
    public function create()
    {
        $categorias = Categoria::all();  //Trae todas las categorias de la tabla categorías.ej: id=1 descripcion=remeras , id=2 descripcion='joggings'
                             //Para qué trae todas las categorias? para llenar un <select> en el formulario de productos.
                            //Porque al crear un producto necesita elegir en un <select> : 'remeras' 'joggings', etc.  
        
                            
        return view('backend.productos.create', compact('categorias'));  //redirige a la vista del formulario create
    }

    //Guarda el registro recién creado del producto en la base de datos.
    public function store(Request $request)
    {
        //primero verifica que todos los datos ingresados sean válidos.
        $request->validate([
        'nombre' => 'required|string|max:150',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'url_imagen' => 'nullable|string|max:255',
        'genero' => 'required|in:masculino,femenino,unisex',
        'categoria_id' => 'required|exists:categorias,id',
        'activo' => 'required|boolean',
        ]);

        //luego guarda en la variable $request todos los datos validados
        Producto::create($request->all());

        //redirige a la pagina de index para mostrar el mensaje "producto creador correctamente" si es que el registro se creo Y GUARDÓ correctamente.
        return redirect()
        ->route('productos.index')
        ->with('exito', 'Producto creado correctamente.');
    }

    //Muestra un registro entero de UN producto en particular, almacenado en la base de datos.
    public function show(Producto $producto)
    {
        return view('backend.productos.show', compact('producto'));
    }


    //Muestra el formulario edit para editar un registro de un producto almacenado en la db.
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all(); //trae de nuevo todas las categorias registradas para llenar el <select>

        //muestra el formulario edit.
        return view(
            'backend.productos.edit',
            compact('producto', 'categorias')
        );
    }
    

    //Actualiza los datos en la db del registro que se editó
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
        'nombre' => 'required|string|max:150',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'url_imagen' => 'nullable|string|max:255',
        'genero' => 'required|in:masculino,femenino,unisex',
        'categoria_id' => 'required|exists:categorias,id',
        'activo' => 'required|boolean',
        ]);

        $producto->update($request->all());

        return redirect()
            ->route('productos.index')
            ->with('exito', 'Producto actualizado correctamente.');
    }

    //Elimina logicamente (no fisicamente) un registro de la base de datos
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()
        ->route('productos.index')
        ->with('exito', 'Producto eliminado correctamente.');
    }

    public function deleted()
    {
        $productos = Producto::onlyTrashed()->get();

        return view(
            'backend.productos.deleted',
            compact('productos')
        );
    }

    public function restore(int $id)
    {
        $producto = Producto::onlyTrashed()->findOrFail($id);

        $producto->restore();

        return redirect()
            ->route('productos.index')
            ->with('exito', 'Producto restaurado correctamente.');
    }
}
