<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => function(){
                return User::inRandomOrder()->first()->id;
            },
            'name' => fake()->name,
            'type' => fake()->randomElement(['PDF', 'Image']),
            'version' => fake()->randomNumber(),
            'description' => fake()->paragraph,
            'date' => fake()->dateTime,
        ];
    }
}
