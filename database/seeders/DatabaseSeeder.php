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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'phone' => '123456789',
            'workplace' => 'Admin',
            'promotional_code' => 'Admin',
            'position' => 'manager',
        ]);
        $numberOfUsers = 10;
        for ($i = 1; $i <= $numberOfUsers; $i++) {
            DB::table('users')->insert([
                'first_name' => 'Admin' . $i,
                'last_name' => 'Admin' . $i,
                'email' => 'admin' . $i . '@gmail.com',
                'password' => bcrypt('admin'),
                'phone' => '123456789',
                'workplace' => 'Admin',
                'promotional_code' => 'Admin',
                'position' => 'manager' . $i,
                'name' => 'User' . $i,
            ]);
        }
        Package::factory(10)->create();;
        Product::factory(10)->create();;
    }
}
