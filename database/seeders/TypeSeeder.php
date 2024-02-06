<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'DWES', 'model' => 'Término'],
            ['name' => 'DWEC', 'model' => 'Término'],
            // Añade tantos tipos de términos como necesites
            ['name' => 'Profesor', 'model' => 'Usuario'],
            ['name' => 'Alumno', 'model' => 'Usuario'],
            // Añade otros roles de usuario si es necesario
        ];

        foreach ($types as $type) {
            DB::table('types')->insert([
                'name' => $type['name'],
                'model' => $type['model'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
