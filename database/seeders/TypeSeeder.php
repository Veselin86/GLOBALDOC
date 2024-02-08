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
    public function run()
    {
        DB::table('types')->insert([
            ['model' => 'User', 'name' => 'Teacher'],
            ['model' => 'User', 'name' => 'Student'],
            ['model' => 'Term', 'name' => 'Subject'],
            ['model' => 'Term', 'name' => 'Topic'],
        ]);
    }
}
