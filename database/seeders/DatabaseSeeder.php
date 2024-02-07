<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Document;
use App\Models\Idea;
use App\Models\Release;
use App\Models\Task;
use App\Models\Change;
use App\Models\Report;
use App\Models\Package;
use App\Models\Product;
use App\Models\Delivery;
use App\Models\LandingPage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory(1)->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
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
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'workplace' => 'Admin',
                'promotional_code' => 'Admin',
                'position' => 'manager' . $i,
                'name' => 'User' . $i,
            ]);
        }
        LandingPage::create([
            'home' => [],
            'about_us'=> [],
            'features'=> [],
            'contact_us'=> []
        ]);
        // Remove Dispatcher
        Package::unsetEventDispatcher();
        Package::factory(10)->create();

        Product::unsetEventDispatcher();
        Product::factory(10)->create();

        Change::unsetEventDispatcher();
        Change::factory(10)->create();

        Delivery::unsetEventDispatcher();
        Delivery::factory(10)->create();

        Report::unsetEventDispatcher();
        Report::factory(10)->create();

        Idea::unsetEventDispatcher();
        Idea::factory(10)->create();

        // Task::unsetEventDispatcher();
        // Task::factory(10)->create();

        Document::unsetEventDispatcher();
        Document::factory(10)->create();

        Release::unsetEventDispatcher();
        Release::factory(10)->create();

        $this->call([
            PermissionSeeder::class,
            SelectSeeder::class,
            LandingPageSeeder::class,
            FaqSeeder::class,
            FeatureSeeder::class,
        ]);
    }
}
