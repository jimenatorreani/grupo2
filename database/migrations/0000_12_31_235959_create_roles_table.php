<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    // Ejecuta las migraciones. (o crea la estructura en la base de datos de la tabla 'roles')
     
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); // unique() evita roles duplicados (acá sería 'cliente' O 'admin')
            $table->string('descripcion')->nullable(); // campo opcional (acá iría la descripcion de cada rol)
            $table->timestamps(); // created_at y updated_at (automáticos)
            $table->softDeletes(); // deleted_at — borrado lógico
        });
    }

    /*
      -Revertir las migraciones.
      -revierte migraciones con el comando migrate:rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
