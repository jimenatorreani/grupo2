<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $remeras = Categoria::where('descripcion', 'Remeras')->first();
        $joggings = Categoria::where('descripcion', 'Joggings')->first();
        $conjuntos = Categoria::where('descripcion', 'Conjuntos')->first();
        $zapatillas = Categoria::where('descripcion', 'Zapatillas')->first();

        // MUJERES - Remeras (15)
        for ($i = 1; $i <= 15; $i++) {
            Producto::create([
                'nombre' => "Remera deportiva mujer $i",
                'descripcion' => "Remera deportiva femenina",
                'precio' => 12000,
                'stock' => 10,
                'url_imagen' => "mujeres/remeras/remera{$i}.jpg",
                'genero' => 'femenino',
                'categoria_id' => $remeras->id,
                'activo' => true,
            ]);
        }

        // MUJERES - Conjuntos (16)
        for ($i = 1; $i <= 16; $i++) {
            Producto::create([
                'nombre' => "Conjunto deportivo mujer $i",
                'descripcion' => "Conjunto deportivo femenino",
                'precio' => 18000,
                'stock' => 10,
                'url_imagen' => "mujeres/conjuntos/conjunto{$i}.jpg",
                'genero' => 'femenino',
                'categoria_id' => $conjuntos->id,
                'activo' => true,
            ]);
        }

        // MUJERES - Zapatillas (4)
        for ($i = 1; $i <= 4; $i++) {
            Producto::create([
                'nombre' => "Zapatilla deportiva mujer $i",
                'descripcion' => "Zapatilla deportiva femenina",
                'precio' => 25000,
                'stock' => 10,
                'url_imagen' => "mujeres/zapatillas/zapatilla{$i}.jpg",
                'genero' => 'femenino',
                'categoria_id' => $zapatillas->id,
                'activo' => true,
            ]);
        }

        // HOMBRES - Remeras (16)
        for ($i = 1; $i <= 16; $i++) {
            Producto::create([
                'nombre' => "Remera deportiva hombre $i",
                'descripcion' => "Remera deportiva masculina",
                'precio' => 12000,
                'stock' => 10,
                'url_imagen' => "hombres/remeras/remera{$i}.jpg",
                'genero' => 'masculino',
                'categoria_id' => $remeras->id,
                'activo' => true,
            ]);
        }

        // HOMBRES - Joggings (16)
        for ($i = 1; $i <= 16; $i++) {
            Producto::create([
                'nombre' => "Jogging deportivo hombre $i",
                'descripcion' => "Jogging deportivo masculino",
                'precio' => 15000,
                'stock' => 10,
                'url_imagen' => "hombres/joggings/jogging{$i}.jpg",
                'genero' => 'masculino',
                'categoria_id' => $joggings->id,
                'activo' => true,
            ]);
        }

        // HOMBRES - Zapatillas (4)
        for ($i = 1; $i <= 4; $i++) {
            Producto::create([
                'nombre' => "Zapatilla deportiva hombre $i",
                'descripcion' => "Zapatilla deportiva masculina",
                'precio' => 25000,
                'stock' => 10,
                'url_imagen' => "hombres/zapatillas/zapatilla{$i}.jpg",
                'genero' => 'masculino',
                'categoria_id' => $zapatillas->id,
                'activo' => true,
            ]);
        }
    }
}