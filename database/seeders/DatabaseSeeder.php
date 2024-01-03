<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $numberOfUsers = 10;
        for ($i = 1; $i <= $numberOfUsers; $i++) {
            DB::table('users')->insert([
                'name' => 'User' . $i,
                'email' => 'user' . $i . '@example.com', // Replace with a random email generation logic
                'password' => bcrypt('password'), // You may want to use a more secure method for passwords
            ]);
        }
        Package::factory(10)->create();;
        Product::factory(10)->create();;
    }
}
