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
        // \App\Models\Type::factory(4)->create();
        // Artisan::call('migrate --path=/database/migrations/2024_02_03_181522_create_types_table.php');
        // Artisan::call('migrate --path=/database/migrations/2014_10_12_000000_create_users_table');
        \App\Models\User::factory(5)->create();
        \App\Models\Term::factory(5)->create();
        \App\Models\Idea::factory(5)->create();

        $this->call([
            DescriptionSeeder::class,
            LanguageSeeder::class,
            DescriptionIdeaSeeder::class,
            DescriptionUserSeeder::class,
            TermUserSeeder::class,
        ]);

    }
}
