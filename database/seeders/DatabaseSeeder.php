<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(TypeSeeder::class);
        
        \App\Models\User::factory(10)->create();
        \App\Models\Term::factory(10)->create();

        $this->call([
            DescriptionSeeder::class,
            LanguageSeeder::class,
            DescriptionUserSeeder::class,
            TermUserSeeder::class,
        ]);

        \App\Models\Idea::factory(20)->create();


    }
}
