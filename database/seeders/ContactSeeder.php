<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contactData = [
            'phone' => '123-456-7890',
            'fax' => '987-654-3210',
            'email' => 'info@example.com',
        ];

        Contact::create($contactData);
    }
}
