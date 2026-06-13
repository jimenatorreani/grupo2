<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ventas_cabecera', function (Blueprint $table) {

            $table->foreignId('forma_pago_id')
                  ->nullable()
                  ->after('user_id')
                  ->constrained('forma_pagos');

        });
    }

    public function down(): void
    {
        Schema::table('ventas_cabecera', function (Blueprint $table) {

            $table->dropForeign(['forma_pago_id']);
            $table->dropColumn('forma_pago_id');

        });
    }
};