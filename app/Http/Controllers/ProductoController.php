<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //Lista los productos junto con su categorías, que están registrados en la base de datos.
    public function index()
    {
        /*with('categoria') le dice a Laravel: “Además de traer productos, 
        traé también sus categorias relacionadas”.*/ 
        //paginate(10): carga la vista dividida en 8 paginas, cada pagina contendrá 10 archivos
        $productos = Producto::with('categoria')
                         ->paginate(10); 
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
        'url_imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'genero' => 'required|in:masculino,femenino,unisex',
        'categoria_id' => 'required|exists:categorias,id',
        'activo' => 'nullable|boolean',
        ]);

        //crea una variable $datos
        $datos = $request->all();
        $datos['activo'] = true;

        /*Luego hasFile() pregunta: ¿el usuario seleccionó una imágen?,
        si la seleccionó entra al if, sino continúa normalmente 
        
        if ($request->hasFile('url_imagen')) {

            $archivo = $request->file('url_imagen');
            $nombreProducto = Str::slug($request->nombre); //acá "arregla el nombre del archivo que se va a subir. Ejemplo: si el producto es: Remera Adidas Negra, Laravel genera: remera-adidas-negra
            $extension = $archivo->getClientOriginalExtension(); //obtiene la extencion del archivo, si era "foto123.png" obtiene png
            $nombreArchivo = $nombreProducto . '.' . $extension; //concatena el nombre que quedó con la extención. Ejemplo: remera-adidas-negra.png

        }
        */

            //Luego hasFile() pregunta: ¿el usuario seleccionó una imágen?,
            //si la seleccionó entra al if, sino continúa normalmente 
            if ($request->hasFile('url_imagen')) {

            // Imagen seleccionada
            $archivo = $request->file('url_imagen');

            // Nombre del producto convertido en formato apto para archivo
            $nombreProducto = Str::slug($request->nombre);

            // jpg, png, webp...
            $extension = $archivo->getClientOriginalExtension();

            // Nombre final del archivo
            $nombreArchivo = $nombreProducto . '.' . $extension;

            // Buscar la categoría elegida
            $categoria = Categoria::find($request->categoria_id);

            // Convertir el género al nombre de la carpeta
            $carpetaGenero = match ($request->genero) {
                'masculino' => 'hombres',
                'femenino' => 'mujeres',
                default => 'unisex',
            };

            // Convertir la categoría en nombre de carpeta
            $carpetaCategoria = Str::lower($categoria->descripcion);

            // Ruta donde se guardará
            $ruta = public_path(
                "img/productos/$carpetaGenero/$carpetaCategoria"
            );

            // Mover la imagen
            $archivo->move($ruta, $nombreArchivo);

            // Guardar la ruta relativa en la base de datos
            $datos['url_imagen'] =
                "$carpetaGenero/$carpetaCategoria/$nombreArchivo";
        }

        //luego guarda en la variable $request todos los datos validados
        Producto::create($datos);

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
