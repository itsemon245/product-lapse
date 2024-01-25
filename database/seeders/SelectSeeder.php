<?php

namespace Database\Seeders;

use App\Enums\Feature;
use App\Models\Select;
use App\Enums\SelectType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SelectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::PRODUCT->value,
            'type' => SelectType::CATEGORY->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Men',
                'ar'=> 'رجال'
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::PRODUCT->value,
            'type' => SelectType::STAGE->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Not Started',
                'ar'=> 'لم يبدأ'
            ],
        ]);
    }
}
