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
            ['clave_upp' => '270031311002','created_at' => now(), 'updated_at' => now()],
            ['clave_upp'=> '270037514002','created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('upps')->insert($upps);

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
