<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Idea;
use App\Models\Task;
use App\Models\Change;
use App\Models\Report;
use App\Models\Address;
use App\Models\Product;
use App\Models\Release;
use App\Models\Delivery;
use App\Models\Document;
use App\Models\PackageFeature;
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
            'type' => 'subscriber',
            'owner_id' => $admin[0]->id,
        ]);
        Address::create([
            'name'=> $subscriber[0]->name,
            'user_id'=> $subscriber[0]->id,
            'email'=> $subscriber[0]->email,
            'phone'=> $subscriber[0]->phone,
            'type'=> 'billing',
            'street'=> fake()->streetAddress(),
            'city'=> fake()->city(),
            'country'=> fake()->country(),
            'state'=> fake()->city(),
            'ip'=> fake()->ipv4(),
            'use_as_shipping'=> false,
            'zip'=> '1234',
        ]);
        Address::create([
            'name'=> 'Shipping Address Name',
            'user_id'=> $subscriber[0]->id,
            'email'=> $subscriber[0]->email,
            'phone'=> $subscriber[0]->phone,
            'type'=> 'shipping',
            'street'=> fake()->streetAddress(),
            'city'=> fake()->city(),
            'country'=> fake()->country(),
            'state'=> fake()->city(),
            'ip'=> fake()->ipv4(),
            'use_as_shipping'=> false,
            'zip'=> '1234',
        ]);
        $member = \App\Models\User::factory(1)->create([
            'first_name' => 'Member',
            'last_name' => 'User',
            'email' => 'member@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '123456789',
            'workplace' => 'hello',
            'promotional_code' => 'subscriber',
            'type' => 'member',
            'owner_id' => $subscriber[0]->id,
        ]);

        // Remove Dispatcher
        // Package::unsetEventDispatcher();
        // Package::factory(10)->create();
        $this->call([
            SelectSeeder::class,
        ]);
        $this->call([
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
            PackageFeatureSeeder::class,
            PackageSeeder::class,
            ContactSeeder::class,
            FaqSeeder::class,
            FeatureSeeder::class,
            PageSeeder::class
        ]);

        $admin[0]->assignRole('admin');
        $subscriber[0]->assignRole('account holder');
        $member[0]->assignRole('product manager');
    }
}
