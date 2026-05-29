<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Run the migrations.
    //Crea la estructura de la tabla 'productos'
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {

                $table->id();

                $table->string('nombre', 150);

                $table->text('descripcion')->nullable();

                $table->decimal('precio', 10, 2);

                $table->unsignedInteger('stock')->default(0); //el stok nunca debería ser negativo por eso 'unsignedInteger' 

                $table->string('url_imagen')->nullable();

                $table->enum('genero', [
                    'masculino',
                    'femenino',
                    'unisex'
                ]);

                $table->foreignId('categoria_id') //crea la columna categoria_id
                      ->constrained('categorias') //crea la relación FK (relacion de clave foranea) con la tabla categorias
                      ->restrictOnDelete(); //impide borrar una categoria si hay productos usándolo. ej:no podés borrar “joggings” si existen productos registrados con esa categoria.

                $table->boolean('activo')->default(true); //se usa para: ocultar productos, pausar ventas, deshabilitar temporalmente.

                $table->timestamps(); // created_at y updated_at (automáticos)

                $table->softDeletes(); // deleted_at — borrado lógico
                                      /* a diferencia de: $table->boolean('activo')->default(true), se usa para:
                                      eliminar productos sin perder datos, recuperar información, auditoría. */

            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
