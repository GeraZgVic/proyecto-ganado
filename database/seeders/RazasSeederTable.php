<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RazasSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $razas = [
            ['nombre' => 'Hereford', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Charolais', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Brahman', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Nelore', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Pardo Suizo Europeo', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Indobrasil', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Gir', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Simmental', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Limousin', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Angus', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Beefmaster', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Brangus', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Cruza', 'created_at' => now(), 'updated_at' => now()],
            
        ];

        DB::table('razas')->insert($razas);
    }
}
