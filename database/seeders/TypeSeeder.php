<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Type::create(['model' => 'User', 'name' => 'Teacher']);
        Type::create(['model' => 'User', 'name' => 'Student']);
        Type::create(['model' => 'Term', 'name' => 'Subject']);
        Type::create(['model' => 'Term', 'name' => 'Topic']);
    }
}
