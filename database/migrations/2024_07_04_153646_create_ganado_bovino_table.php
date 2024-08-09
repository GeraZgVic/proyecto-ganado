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
        Schema::create('ganado_bovinos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->nullable();
            $table->string('imagen')->nullable();
            // $table->string('estatus_genetico', 150)->nullable();
            $table->enum('estatus_genetico', ['Vacía', 'Preñada', 'Donadora', 'Receptora']);
            $table->date('fecha_nacimiento')->nullable(); // para gestionar las etapas del bovino

            // NUEVOS CAMPOS (FALTA POR ANALIZAR)
            $table->float('peso_al_nacer')->nullable();
            $table->float('peso_al_destete')->nullable();
            $table->float('peso_al_year')->nullable();

            $table->date('fecha_destete')->nullable();
            $table->string('id_siniiga')->nullable();
            $table->string('id_registro')->nullable(); // ID PARA RAZA PURA
            // Foreign Key
            $table->foreignId('raza_id')->constrained('razas');
            $table->foreignId('sexo_id')->constrained('sexos');
            $table->foreignId('upp_id')->constrained('upps');
            $table->foreignId('propietario_id')->constrained('propietarios');
            $table->foreignId('estatus_comercio_id')->constrained('estatus_comercio');
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
