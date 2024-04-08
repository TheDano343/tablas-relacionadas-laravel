<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

// Asegúrate de que el número de versión del archivo create_carreras_table.php sea menor que el número de versión del archivo create_personas_table.php para que se ejecute primero al ejecutar las migraciones. Esto garantiza que la tabla carreras exista antes de que se intente crear la clave foránea en la tabla personas.
// De esta manera se migra una tabla en especifico : php artisan migrate --path=/database/migrations/2024_04_03_165956_create_carreras_table.php
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 35);
            $table->text('descripcion');
            $table->unsignedBigInteger('carrera_id')->unsigned();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
