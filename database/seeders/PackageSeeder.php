<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PackageFeature;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $packages = [
            [
                'package'  => [
                    'name'            => [
                        'en' => 'Free Package',
                        'ar' => 'الباقة المجانية',
                     ],
                    'price'           => 0,
                    'product_limit'   => 1,
                    'limited_feature' => true,
                    'is_popular'      => false,
                 ],
                'features' => [ 1, 2 ],
             ],
            [
                'package'  => [
                    'name'            => [
                        'en' => 'Basic Package',
                        'ar' => 'الباقة الأساسية',
                     ],
                    'price'           => 199,
                    'validity'        => 1,
                    'unit'            => 'year',
                    'product_limit'   => 3,
                    'limited_feature' => false,
                    'is_popular'      => true,
                 ],
                'features' => [ 1, 2, 3, 4, 5 ],
             ],
            [
                'package'  => [
                    'name'            => [
                        'en' => 'Golden Package',
                        'ar' => 'الباقة الذهبية',
                     ],
                    'price'           => 299,
                    'product_limit'   => 10,
                    'validity'        => 1,
                    'unit'            => 'year',
                    'limited_feature' => false,
                    'is_popular'      => false,
                 ],
                'features' => [ 1, 2, 3, 4, 5 ],
             ],
            [
                'package'  => [
                    'name'            => [
                        'en' => 'Diamond Package',
                        'ar' => 'الباقة الماسية',
                     ],
                    'price'           => 499,
                    'product_limit'   => 30,
                    'validity'        => 1,
                    'unit'            => 'year',
                    'limited_feature' => false,
                    'is_popular'      => false,
                 ],
                'features' => [ 1, 2, 3, 4, 5 ],
             ],
         ];

         $features = PackageFeature::get();
        foreach ($packages as $i => $data) {
            $package = Package::create($data[ 'package' ]);
            foreach ($features as $feature) {
                $package->features()->attach($feature->id);
            }
            foreach ($data[ 'features' ] as $featureId) {
                $package->features()->updateExistingPivot($featureId, [ 'is_on' => true ]);
            }
        }

    }
}
