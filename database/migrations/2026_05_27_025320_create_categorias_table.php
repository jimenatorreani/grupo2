<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Run the migrations.
    // Crea la estructura de la tabla 'categorias'
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->unique(); //unique() evita categorías duplicadas, un producto no puede pertenecer a varias categorias
            $table->timestamps(); //created_at y updated_at (automáticos)
            $table->softDeletes(); // deleted_at — borrado lógico
        });
    }

    //Revierte la Migracion
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
