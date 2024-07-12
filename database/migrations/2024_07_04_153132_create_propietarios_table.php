<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('upp_id')->nullable()->constrained()->onDelete('set null'); // Crear la columna como nullable y añadir la restricción de la llave foránea en la misma línea
            $table->string('nombre');
            $table->string('apellido_materno')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propietarios');
    }
};
