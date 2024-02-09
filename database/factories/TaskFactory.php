<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
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
            'creator_id' => function(){
                return User::inRandomOrder()->first()->id;
            },
            'name' => fake()->name,
            'category' => fake()->randomElement(['Working on', 'Pending', 'Stopped']),
            'status' => fake()->randomElement(['Working on', 'Pending', 'Stopped']),
            'details' => fake()->paragraph,
            'steps' => fake()->paragraph,
            'administrator' => fake()->name,
        ];
    }
}
