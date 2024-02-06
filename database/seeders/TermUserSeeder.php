<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Term;
use App\Models\User;


class TermUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $terms = Term::all();
        $users = User::all();

        foreach ($terms as $term) {
            $term->users()->sync(
                $users->random(rand(1, 3))->pluck('nia')->toArray()
            );
        }
    }
}
