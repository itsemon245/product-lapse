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
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'name' => fake()->name,
            'items' => fake()->text,
            'link' => fake()->url,
            'attach_file' => fake()->url,
            'password' => fake()->text,
            'administrator' => fake()->text,
            'add_attachments' =>  fake()->url,
        ];
    }
}
