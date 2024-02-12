<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Description;
use App\Models\User;
use Carbon\Carbon;

class DescriptionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $descriptions = Description::all();
        $users = User::all();

        foreach ($descriptions as $description) {
            $userRatings = [];
            foreach ($users->random(rand(1, 3)) as $user) {
                $userRatings[$user->nia] = [
                    'rating' => rand(1, 5),
                    'rating_date' => Carbon::now()
                ];
            }
            $description->users()->syncWithoutDetaching($userRatings);
        }
    }
}
