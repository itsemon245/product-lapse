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
                'en' => 'Men',
                'ar' => 'رجال'
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
                'en' => 'Working on',
                'ar' => 'يعمل على',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::IDEA->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Pending',
                'ar' => 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::IDEA->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Stopped',
                'ar' => 'توقفت',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Working on',
                'ar' => 'يعمل على',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Pending',
                'ar' => 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Stopped',
                'ar' => 'توقفت',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::CATEGORY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Working on',
                'ar' => 'يعمل على',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::CATEGORY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Pending',
                'ar' => 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::TASK->value,
            'type' => SelectType::CATEGORY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Stopped',
                'ar' => 'توقفت',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Working on',
                'ar' => 'يعمل على',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Pending',
                'ar' => 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::STATUS->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Stopped',
                'ar' => 'توقفت',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::DOCUMENT->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en' => 'PDF',
                'ar' => 'بي دي إف',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::DOCUMENT->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Image',
                'ar' => 'صورة',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::REPORT->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en' => 'PDF',
                'ar' => 'بي دي إف',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::REPORT->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Image',
                'ar' => 'صورة',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CERTIFICATE->value,
            'type' => SelectType::SUBMISSION->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Approved',
                'ar' => 'موافقة',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CERTIFICATE->value,
            'type' => SelectType::SUBMISSION->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Cancel',
                'ar' => 'يلغي',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Low',
                'ar' => 'قليل',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Medium',
                'ar' => 'واسطة',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'High',
                'ar' => 'عالي',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::TICKET->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Start',
                'ar' => 'يبدأ',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::TICKET->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Not start',
                'ar' => 'لا تبدأ',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Good',
                'ar' => 'جيد',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Not bad',
                'ar' => 'ليس سيئًا',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::SUPPORT->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Best',
                'ar' => 'أفضل',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Good',
                'ar' => 'يعمل على',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Not bad',
                'ar' => 'قيد الانتظار',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::CLASSIFICATION->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Best',
                'ar' => 'توقفت',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Low',
                'ar' => 'قليل',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'High',
                'ar' => 'عالي',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::CHANGE->value,
            'type' => SelectType::PRIORITY->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Medium',
                'ar' => 'واسطة',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::USER->value,
            'type' => SelectType::TASK->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Low',
                'ar' => 'قليل',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::USER->value,
            'type' => SelectType::TASK->value,
            'color' => "#fff",
            'value' => [
                'en' => 'High',
                'ar' => 'عالي',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::USER->value,
            'type' => SelectType::TASK->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Medium',
                'ar' => 'واسطة',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::PACKAGE->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Free package',
                'ar' => 'الباقة المجانية',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::PACKAGE->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Basic Package',
                'ar' => 'الباقة الأساسية',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::PACKAGE->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Golden Package',
                'ar' => 'الباقة الذهبية',
            ],
        ]);
        Select::create([
            'owner_id' => 1,
            'model_type' => Feature::PACKAGE->value,
            'type' => SelectType::TYPE->value,
            'color' => "#fff",
            'value' => [
                'en' => 'Diamond Package',
                'ar' => 'الباقة الماسية',
            ],
        ]);
    }
}
