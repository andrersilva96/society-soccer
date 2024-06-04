<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'is_goalkeeper' => $this->faker->boolean(),
            'is_presence' => $this->faker->boolean(),
            'level' => $this->faker->numberBetween(1, 5)
        ];
    }
}
