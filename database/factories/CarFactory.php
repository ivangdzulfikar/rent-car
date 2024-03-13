<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => fake()->word(1, true),
            'model' => fake()->word(1, true),
            'number_plate' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
            'price_perday'=> fake()->numberBetween(100000, 500000)
        ];
    }
}
