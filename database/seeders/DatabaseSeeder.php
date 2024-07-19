<?php

namespace Database\Seeders;

use App\Models\Upp;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'correo@correo.com',
            'password' => Hash::make('password123')
        ]);

        // Upps
        $upps = [
            ['clave_upp' => '270031311002', 'predio' => 'Rancho Heredia', 'created_at' => now(), 'updated_at' => now()],
            ['clave_upp' => '270037514002', 'predio' => 'Rancho Zúñiga', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('upps')->insert($upps);


        // Propietarios
        $propietarios = [
            ['upp_id' => '1', 'nombre' => 'Karla Sofia', 'apellido_materno' => 'Hernández', 'apellido_paterno' => 'García', 'created_at' => now(), 'updated_at' => now()],
            ['upp_id' => '1', 'nombre' => 'Keyla Sarai', 'apellido_materno' => 'Hernández', 'apellido_paterno' => 'García', 'created_at' => now(), 'updated_at' => now()],
            ['upp_id' => '2', 'nombre' => 'Ada', 'apellido_materno' => 'Morales', 'apellido_paterno' => 'Hernández', 'created_at' => now(), 'updated_at' => now()],
            ['upp_id' => '2', 'nombre' => 'Isaias', 'apellido_materno' => 'Gordillo', 'apellido_paterno' => 'García', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('propietarios')->insert($propietarios);

        // Estatus comercio
        $estatus_comercio = [
            ['tipo_ganado' => 'Puro', 'created_at' => now(), 'updated_at' => now()],
            ['tipo_ganado' => 'Comercial', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('estatus_comercio')->insert($estatus_comercio);

        $this->call(RazasSeederTable::class);
        $this->call(SexoSeederTable::class);
    }
}
