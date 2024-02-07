<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $question = [
            'en' => 'What services can I get from the Product Labs application?',
            'ar' => 'What services can I get from the Product Labs application? AR',
        ];

        $answer = [
            'en' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout',
            'ar' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout -AR',
        ];

        for ($i = 0; $i < 10; $i++) {
            \App\Models\Faq::create([
                'question' => $question,
                'answer' => $answer,
            ]);
        }
    }
}
