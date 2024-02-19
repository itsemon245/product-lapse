<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Idea;
use App\Models\Task;
use App\Models\Change;
use App\Models\Report;
use App\Models\Product;
use App\Models\Release;
use App\Models\Delivery;
use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Release::unsetEventDispatcher();
        // Change::unsetEventDispatcher();
        // Delivery::unsetEventDispatcher();
        // Idea::unsetEventDispatcher();
        // Report::unsetEventDispatcher();
        // Task::unsetEventDispatcher();
        // Document::unsetEventDispatcher();
        // Product::unsetEventDispatcher();


        // \App\Models\User::factory(10)->create();

        $admin = \App\Models\User::factory(1)->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '123456789',
            'workplace' => 'Admin',
            'promotional_code' => 'Admin',
            'position' => 'manager',
            'type' => 'admin',
        ]);
        $subscriber = \App\Models\User::factory(1)->create([
            'first_name' => 'Subscriber',
            'last_name' => 'User',
            'email' => 'subscriber@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '123456789',
            'workplace' => 'hello',
            'promotional_code' => 'Admin',
            'position' => 'manager',
            'type' => 'subscriber',
            'owner_id' => $admin[0]->id,
        ]);
        $member = \App\Models\User::factory(1)->create([
            'first_name' => 'Member',
            'last_name' => 'User',
            'email' => 'member@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '123456789',
            'workplace' => 'hello',
            'promotional_code' => 'subscriber',
            'position' => 'manager',
            'type' => 'member',
            'owner_id' => $subscriber[0]->id,
        ]);

        // Remove Dispatcher
        // Package::unsetEventDispatcher();
        // Package::factory(10)->create();
        $this->call([
            SelectSeeder::class,
            ProductSeeder::class,
        ]);

        Change::factory(10)->create();

        Delivery::factory(10)->create();

        Report::factory(10)->create();

        Idea::factory(10)->create();

        Task::factory(10)->create();

        Document::factory(10)->create();

        Release::factory(10)->create();

        $this->call([
            PermissionSeeder::class,
            LandingPageSeeder::class,
                // PackageSeeder::class,
            ContactSeeder::class,
            FaqSeeder::class,
            FeatureSeeder::class,
        ]);

        $admin[0]->assignRole('admin');
        $subscriber[0]->assignRole('account holder');
        $member[0]->assignRole('product manager');
    }
}
