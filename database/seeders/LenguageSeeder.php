<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LenguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lenguages = [
            ['iso_code' => 'ES', 'lenguage' => 'Español'],
            ['iso_code' => 'EN', 'lenguage' => 'English'],
            ['iso_code' => 'VA', 'lenguage' => 'Valencia'],
            ['iso_code' => 'DE', 'lenguage' => 'German'],
            ['iso_code' => 'FR', 'lenguage' => 'Française'],
        ];

        foreach ($lenguages as $lenguage) {
            DB::table('lenguages')->insert([
                'iso_code' => $lenguage['iso_code'],
                'lenguage' => $lenguage['lenguage'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
