<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $model = $this->faker->randomElement(['Term', 'User']);
        if ($this->faker->boolean) {
            $name = $this->faker->randomElement(['DWES', 'DWEC', 'DIW']);
            $model = 'Término';
        } else {
            $name = $this->faker->randomElement(['Alumno', 'Profesor']);
            $model = 'Usuario';
        }

        return [
            'name' => $name,
            'model' => $model,
        ];
    }
}
