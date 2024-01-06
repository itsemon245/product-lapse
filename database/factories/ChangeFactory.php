<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Change>
 */
class ChangeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'title' => fake()->name,
            'classification' => 'one',
            'priority' => 'two',
            'status' => 'three',
            'details' => fake()->paragraph,
            'administrator' => fake()->name,
            'required_completion_date' => fake()->dateTime,
            
        ];
    }
}
