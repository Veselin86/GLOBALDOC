<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Term;
use App\Models\Description;

class DescriptionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Term::count() == 0) {
            // Opcional: puedes llamar aquí a un seeder de Term si quieres
            // $this->call(TermSeeder::class);
            echo "Por favor, crea algunos términos antes de ejecutar este seeder.";
            return;
        }
        
        $terms = Term::all();
        foreach ($terms as $term) {
            Description::create([
                'notes' => 'Notas de ejemplo para el término ' . $term->name,
                'synthesis' => 'Síntesis de ejemplo para el término ' . $term->name,
                'term_id' => $term->id,
            ]);
        }
    }
}
