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
        Schema::create('ganado_bovino', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->nullable();
            $table->string('imagen')->nullable();
            $table->string('estatus_genetico', 150)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_destete')->nullable();
            $table->date('id_siniiga')->nullable();
            // Foreign Key
            $table->foreignId('raza_id')->constrained('razas');
            $table->foreignId('sexo_id')->constrained('sexos');
            $table->foreignId('propietario_id')->constrained('propietarios');
            $table->foreignId('estatus_comercio_id')->constrained('estatus_comercio');
            $table->foreignId('tipo_registro_id')->constrained('tipo_registro');
            $table->foreignId('madre_id')->nullable()->constrained('ganado_bovino');
            $table->foreignId('padre_id')->nullable()->constrained('ganado_bovino');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganado_bovino');
    }
};
