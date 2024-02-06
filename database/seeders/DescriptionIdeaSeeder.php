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
        // Obtén todas las descripciones e ideas
        $descriptions = Description::all();
        $ideas = Idea::all();

        // Para cada descripción, asóciala con algunas ideas
        foreach ($descriptions as $description) {
            // Usa el método sync para asociar ideas con la descripción
            // El método sync acepta un array de IDs para asociar con el objeto
            $description->ideas()->sync(
                // Usa el método pluck para obtener los IDs de algunas ideas aleatorias
                $ideas->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
