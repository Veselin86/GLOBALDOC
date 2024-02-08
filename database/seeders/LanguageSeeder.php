<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['iso_code' => 'ES', 'language' => 'Español'],
            ['iso_code' => 'EN', 'language' => 'English'],
            ['iso_code' => 'VA', 'language' => 'Valencia'],
            ['iso_code' => 'DE', 'language' => 'German'],
            ['iso_code' => 'FR', 'language' => 'Française'],
        ];

        foreach ($languages as $language) {
            DB::table('languages')->insert([
                'iso_code' => $language['iso_code'],
                'language' => $language['language'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
