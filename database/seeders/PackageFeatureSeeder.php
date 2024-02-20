<?php

namespace Database\Seeders;

use App\Models\PackageFeature;
use Illuminate\Database\Seeder;

class PackageFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                "en" => "Limited products",
                "ar" => "منتجات محدودة",
             ],
            [
                "en" => "Technical support",
                "ar" => "الدعم الفني",
             ],
            [
                "en" => "Receive data",
                "ar" => "استقبال البيانات",
             ],
            [
                "en" => "Security system",
                "ar" => "نظام الأمان",
             ],
            [
                "en" => "Other features",
                "ar" => "ميزات أخرى",
             ],
         ];

        foreach ($features as $feature) {
            $f = PackageFeature::create([ 'name' => $feature ]);
        }
    }
}
