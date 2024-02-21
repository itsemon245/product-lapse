<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Select;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $priority = Select::of('idea')->type('priority')->first();
        return [
            'name' => fake()->name,
            'owner' => fake()->text(12),
            'priority' => $priority->value->en,
            'details' => fake()->paragraph,
            'requirements' => fake()->paragraph,
        ];
    }
}
