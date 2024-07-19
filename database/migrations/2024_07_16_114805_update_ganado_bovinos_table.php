<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('ganado_bovinos', function (Blueprint $table) {
            $table->integer('id_interno')->unique()->after('id'); // Asegúrate de que no existe ya esta columna
            $table->integer('madre_id_interno')->nullable()->default(null)->after('estatus_comercio_id');
            $table->integer('padre_id_interno')->nullable()->default(null)->after('madre_id_interno');

           // Añadir los índices y las restricciones de clave externa
           $table->index('id_interno'); // Asegurarse de que hay un índice en la columna referenciada
           $table->foreign('madre_id_interno')->references('id_interno')->on('ganado_bovinos')->nullOnDelete();
           $table->foreign('padre_id_interno')->references('id_interno')->on('ganado_bovinos')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ganado_bovinos', function (Blueprint $table) {
            $table->dropForeign(['madre_id_interno']);
            $table->dropForeign(['padre_id_interno']);
            $table->dropIndex(['id_interno']);
            $table->dropColumn('id_interno');
            $table->dropColumn('madre_id_interno');
            $table->dropColumn('padre_id_interno');
        });
    }
};
