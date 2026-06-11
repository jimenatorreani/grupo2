<?php

namespace App\Http\Controllers;

use App\Models\Producto;

use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function mujeres($categoria = null)
    {

            //trae todos los registros que están activos de la tabla productos, donde el género sea 'femenino'
            $productos = Producto::where('genero', 'femenino')
                                ->where('activo', true);

            if ($categoria) {                                                            //han llamado a una categoria desde la url? si la han llamado, entonces hacé esto:
                $productos->whereHas('categoria', function ($q) use ($categoria) {       //whereHas('categoria'):Busca solamente productos cuya categoría cumpla cierta condición.
                    $q->where('descripcion', $categoria);                                    //$q->where('nombre', $categoria);: trae solamente los productos de una cierta categoría. ejemplo: si llamamos a 'zapatillas', traera productos zapatillas.
                });                                                                     
            }                                                                           

            //Renderizá la vista.
            return view(
                'frontend.catalogo.mujeres',
                [
                    'categoria' => $categoria, //manda la info al blade para que pueda usarla
                    'productos' => $productos->get() //manda la info al blade, luego obtine los productos de las categorias que se ha seleccionado
                ]
            );
    }

    public function hombres($categoria = null)
    {

            //trae todos los registros que están activos de la tabla productos, donde el género sea 'femenino'
            $productos = Producto::where('genero', 'masculino')
                                ->where('activo', true);

            if ($categoria) {                                                            //han llamado a una categoria desde la url? si la han llamado, entonces hacé esto:
                $productos->whereHas('categoria', function ($q) use ($categoria) {       //whereHas('categoria'):Busca solamente productos cuya categoría cumpla cierta condición.
                    $q->where('descripcion', $categoria);                                    //$q->where('nombre', $categoria);: trae solamente los productos de una cierta categoría. ejemplo: si llamamos a 'zapatillas', traera productos zapatillas.
                });                                                                     
            }                                                                           

            //Renderizá la vista.
            return view(
                'frontend.catalogo.hombres',
                [
                    'categoria' => $categoria, //manda la info al blade para que pueda usarla
                    'productos' => $productos->get() //manda la info al blade, luego obtine los productos de las categorias que se ha seleccionado
                ]
            );
    }
}
