<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackageFeature>
 */
class PackageFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> [
                'en'=> fake('en')->realText(12),
                'ar'=> fake('ar_SA')->realText(12)
            ]
        ];
    }
}
