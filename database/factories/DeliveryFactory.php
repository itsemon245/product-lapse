<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
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
            'name' => fake()->name,
            'username' => str(fake()->name)->slug(),
            'items' => fake()->text,
            'link' => fake()->url,
            'password' => fake()->text,
            'administrator' => fake()->text,
        ];
    }
}
