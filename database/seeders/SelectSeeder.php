<?php

namespace Database\Seeders;

use App\Enums\Colors;
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
            'model_type' => Feature::PRODUCT->value,
            'type' => SelectType::CATEGORY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Men',
                'ar' => 'رجال'
            ],
        ]);
        Select::create([
            'model_type' => Feature::PRODUCT->value,
            'type' => SelectType::STAGE->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Not Started',
                'ar' => 'لم يبدأ'
            ],
        ]);
        Select::create([
            'model_type' => Feature::IDEA->value,
            'type' => SelectType::PRIORITY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'High',
                'ar' => 'يعمل على',
            ],
        ]);
        Select::create([
            'model_type' => Feature::IDEA->value,
            'type' => SelectType::PRIORITY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Low',
                'ar' => 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'model_type' => Feature::IDEA->value,
            'type' => SelectType::PRIORITY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Medium',
                'ar' => 'توقفت',
            ],
        ]);
        Select::create([
            'model_type' => Feature::TASK->value,
            'type' => SelectType::STATUS->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Working on',
                'ar' => 'يعمل على',
            ],
        ]);
        Select::create([
            'model_type' => Feature::TASK->value,
            'type' => SelectType::STATUS->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Pending',
                'ar' => 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'model_type' => Feature::TASK->value,
            'type' => SelectType::STATUS->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Stopped',
                'ar' => 'توقفت',
            ],
        ]);
        Select::create([
            'model_type' => Feature::TASK->value,
            'type' => SelectType::CATEGORY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Men',
                'ar' => 'يعمل على',
            ],
        ]);
        Select::create([
            'model_type' => Feature::TASK->value,
            'type' => SelectType::CATEGORY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Women',
                'ar' => 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'model_type' => Feature::TASK->value,
            'type' => SelectType::CATEGORY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Child',
                'ar' => 'توقفت',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::STATUS->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Working on',
                'ar' => 'يعمل على',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::STATUS->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Pending',
                'ar' => 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::STATUS->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Stopped',
                'ar' => 'توقفت',
            ],
        ]);
        Select::create([
            'model_type' => Feature::DOCUMENT->value,
            'type' => SelectType::TYPE->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'PDF',
                'ar' => 'بي دي إف',
            ],
        ]);
        Select::create([
            'model_type' => Feature::DOCUMENT->value,
            'type' => SelectType::TYPE->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Image',
                'ar' => 'صورة',
            ],
        ]);
        Select::create([
            'model_type' => Feature::REPORT->value,
            'type' => SelectType::TYPE->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'PDF',
                'ar' => 'بي دي إف',
            ],
        ]);
        Select::create([
            'model_type' => Feature::REPORT->value,
            'type' => SelectType::TYPE->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Image',
                'ar' => 'صورة',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CERTIFICATE->value,
            'type' => SelectType::STATUS->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Approved',
                'ar' => 'موافقة',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CERTIFICATE->value,
            'type' => SelectType::STATUS->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Cancel',
                'ar' => 'يلغي',
            ],
        ]);
        Select::create([
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::PRIORITY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Low',
                'ar' => 'قليل',
            ],
        ]);
        Select::create([
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::PRIORITY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Medium',
                'ar' => 'واسطة',
            ],
        ]);
        Select::create([
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::PRIORITY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'High',
                'ar' => 'عالي',
            ],
        ]);
        Select::create([
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::STATUS->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Start',
                'ar' => 'يبدأ',
            ],
        ]);
        Select::create([
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::STATUS->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Not start',
                'ar' => 'لا تبدأ',
            ],
        ]);
        Select::create([
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Good',
                'ar' => 'جيد',
            ],
        ]);
        Select::create([
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Not bad',
                'ar' => 'ليس سيئًا',
            ],
        ]);
        Select::create([
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Best',
                'ar' => 'أفضل',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Good',
                'ar' => 'يعمل على',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Not bad',
                'ar' => 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Best',
                'ar' => 'توقفت',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::PRIORITY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Low',
                'ar' => 'قليل',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::PRIORITY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'High',
                'ar' => 'عالي',
            ],
        ]);
        Select::create([
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::PRIORITY->value,
            'color' => Colors::cases()[random_int(0,2)]->value,
            'value' => [
                'en' => 'Medium',
                'ar' => 'واسطة',
            ],
        ]);
        // Select::create([
        //     'model_type' => Feature::USER->value,
        //     'type' => SelectType::TASK->value,
        //     'color' => Colors::cases()[random_int(0,2)]->value,
        //     'value' => [
        //         'en' => 'Low',
        //         'ar' => 'قليل',
        //     ],
        // ]);
        // Select::create([
        //     'model_type' => Feature::USER->value,
        //     'type' => SelectType::TASK->value,
        //     'color' => Colors::cases()[random_int(0,2)]->value,
        //     'value' => [
        //         'en' => 'High',
        //         'ar' => 'عالي',
        //     ],
        // ]);
        // Select::create([
        //     'model_type' => Feature::USER->value,
        //     'type' => SelectType::TASK->value,
        //     'color' => Colors::cases()[random_int(0,2)]->value,
        //     'value' => [
        //         'en' => 'Medium',
        //         'ar' => 'واسطة',
        //     ],
        // ]);
        // Select::create([
        //     'model_type' => Feature::PACKAGE->value,
        //     'type' => SelectType::TYPE->value,
        //     'color' => Colors::cases()[random_int(0,2)]->value,
        //     'value' => [
        //         'en' => 'Free package',
        //         'ar' => 'الباقة المجانية',
        //     ],
        // ]);
        // Select::create([
        //     'model_type' => Feature::PACKAGE->value,
        //     'type' => SelectType::TYPE->value,
        //     'color' => Colors::cases()[random_int(0,2)]->value,
        //     'value' => [
        //         'en' => 'Basic Package',
        //         'ar' => 'الباقة الأساسية',
        //     ],
        // ]);
        // Select::create([
        //     'model_type' => Feature::PACKAGE->value,
        //     'type' => SelectType::TYPE->value,
        //     'color' => Colors::cases()[random_int(0,2)]->value,
        //     'value' => [
        //         'en' => 'Golden Package',
        //         'ar' => 'الباقة الذهبية',
        //     ],
        // ]);
        // Select::create([
        //     'model_type' => Feature::PACKAGE->value,
        //     'type' => SelectType::TYPE->value,
        //     'color' => Colors::cases()[random_int(0,2)]->value,
        //     'value' => [
        //         'en' => 'Diamond Package',
        //         'ar' => 'الباقة الماسية',
        //     ],
        // ]);
    }
}
