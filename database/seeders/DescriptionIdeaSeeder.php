<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Description;
use App\Models\Idea;

class DescriptionIdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $descriptions = Description::all();
        $ideas = Idea::all();

        foreach ($descriptions as $description) {

            $description->ideas()->sync(
                $ideas->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
