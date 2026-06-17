<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormaPagoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('forma_pagos')->updateOrInsert(
            ['id' => 1],
            ['descripcion' => 'Efectivo']
        );

        DB::table('forma_pagos')->updateOrInsert(
            ['id' => 2],
            ['descripcion' => 'Transferencia']
        );
    }
}