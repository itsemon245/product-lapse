<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::unsetEventDispatcher();
        $products = Product::factory(10)->create();

        foreach ($products as $product) {
            Image::create([
                'imageable_id'=> $product->id,
                'imageable_type'=> get_class($product),
                'url'=> asset('img/logo.png'),
                'path'=> ''
            ]);
        }
    }
}
