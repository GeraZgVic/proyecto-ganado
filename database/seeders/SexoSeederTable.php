<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SexoSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sexos = [
            ['nombre' => 'Macho', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Hembra', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('sexos')->insert($sexos);
    }
}
