<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Release>
 */
class ReleaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => function (){
                return User::inRandomOrder()->first()->id;
            },
            'creator_id' => function(){
                return User::inRandomOrder()->first()->id;
            },
            'name' => fake()->name,
            'version' => fake()->randomNumber,
            'release_date' => fake()->dateTime,
            'description' => fake()->paragraph,
        ];
    }
}
