<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $packages = [
            [
                'owner_id' => ownerId(),

                'name' => [
                    'en' => 'Free package',
                    'ar' => '>الباقة المجانية',
                ],
                'price' => 0,

                'product_limit' => [
                    'en' => '1 Product',
                    'ar' => 'منتج واحد',
                ],
                'features' => [
                    'en' => 'Limited features',
                    'ar' => 'مزايا محدودة',
                ],
            ],

            [
                'owner_id' => ownerId(),

                'name' => [
                    'en' => 'Basic Package',
                    'ar' => 'الباقة الأساسية',
                ],
                'price' => 199,

                'product_limit' => [
                    'en' => '3 Product',
                    'ar' => '3 منتجات',
                ],
                'validity' => [
                    'en' => 'one year',
                    'ar' => 'لمدة سنة كاملة',
                ],
                'features' => [
                    'en' => 'All features',
                    'ar' => 'كافة المزايا',
                ],
                'is_popular' => 1,
            ],

            [
                'owner_id' => ownerId(),

                'name' => [
                    'en' => 'Golden Package',
                    'ar' => 'الباقة الذهبية',
                ],
                'price' => 299,

                'product_limit' => [
                    'en' => '10 Product',
                    'ar' => '10 منتجات',
                ],
                'validity' => [
                    'en' => 'one year',
                    'ar' => 'لمدة سنة كاملة',
                ],
                'features' => [
                    'en' => 'All features',
                    'ar' => 'كافة المزايا',
                ],
            ],

            [
                'owner_id' => ownerId(),

                'name' => [
                    'en' => 'Diamond Package',
                    'ar' => 'الباقة الماسية',
                ],
                'price' => 499,

                'product_limit' => [
                    'en' => '30 Product',
                    'ar' => '30 منتجات',
                ],
                'validity' => [
                    'en' => 'one year',
                    'ar' => 'لمدة سنة كاملة',
                ],
                'features' => [
                    'en' => 'All features',
                    'ar' => 'كافة المزايا',
                ],
            ],
        ];


        foreach ($packages as $packageData) {
            Package::create($packageData);
        }

    }
}
