<?php

namespace Database\Seeders;

use App\Enums\Feature;
use App\Models\Select;
use App\Enums\SelectType;
use Illuminate\Database\Seeder;

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
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::IDEA->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Working on',
                'ar'=> 'يعمل على',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::IDEA->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Pending',
                'ar'=> 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::IDEA->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Stopped',
                'ar'=> 'توقفت',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Working on',
                'ar'=> 'يعمل على',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Pending',
                'ar'=> 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Stopped',
                'ar'=> 'توقفت',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::CATEGORY->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Working on',
                'ar'=> 'يعمل على',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::CATEGORY->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Pending',
                'ar'=> 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::CATEGORY->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Stopped',
                'ar'=> 'توقفت',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Working on',
                'ar'=> 'يعمل على',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Pending',
                'ar'=> 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Stopped',
                'ar'=> 'توقفت',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::DOCUMENT->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'PDF',
                'ar'=> 'بي دي إف',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::DOCUMENT->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Image',
                'ar'=> 'صورة',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::REPORT->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'PDF',
                'ar'=> 'بي دي إف',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::REPORT->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Image',
                'ar'=> 'صورة',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CERTIFICATE->value,
            'type' => SelectType::SUBMISSION->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Approved',
                'ar'=> 'موافقة',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CERTIFICATE->value,
            'type' => SelectType::SUBMISSION->value,
            'color' => "#fff",
            'value' => [
                'en'=> 'Cancel',
                'ar'=> 'يلغي',
            ],
        ]);
    }
}
