<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Select;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sub = demoSub();
        $stage = Select::of('product')->type('stage')->first();
        $cat = Select::of('product')->type('category')->first();
        return [
            'owner_id' => $sub->id,
            'name' => fake()->name,
            'stage' => $stage->value->en,
            'url' => fake()->name,
            'category' => $cat->value->en,
            'description' => fake()->paragraph,
        ];
    }
}
