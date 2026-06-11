<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create([
            'descripcion' => 'Remeras'
        ]);

        Categoria::create([
            'descripcion' => 'Joggings'
        ]);

        Categoria::create([
            'descripcion' => 'Conjuntos'
        ]);

        Categoria::create([
            'descripcion' => 'Zapatillas'
        ]);
    }
}