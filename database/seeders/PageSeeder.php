<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'Privacy Policy',
            'Terms & Conditions',
            'Technical Support'
        ];
        foreach ($titles as $title) {
            Page::create([
                'title' => [
                    'en' => $title,
                    'ar' => $title.'(ar)'
                ],
                'body' => [
                    'en' => '',
                    'ar' => ''
                ],
                'slug' => str($title)->slug()
            ]);
        }
    }
}
