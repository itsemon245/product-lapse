<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'image' => 'img/solution.png',
                'title' => [
                    'en' => 'Product Vision and Ideas',
                    'ar' => 'رؤية المنتج والأفكار',
                ],
                'caption' => [
                    'en' => 'Make your product vision and ideas clear, organized, and ready for execution with an advanced product vision tool',
                    'ar' => 'اجعل رؤيتك وأفكارك للمنتج واضحة ومنظمة وجاهزة للتنفيذ باستخدام أداة رؤية المنتج المتقدمة',
                ],
            ],
            [
                'image' => 'img/plan.png',
                'title' => [
                    'en' => 'Product Planning',
                    'ar' => 'التخطيط',
                ],
                'caption' => [
                    'en' => 'Efficiently plan your product and create an integrated action plan to ensure maximum efficiency in achieving your goals',
                    'ar' => 'قم بالتخطيط الفعّال لمنتجك ووضع خطة عمل متكاملة لضمان الكفاءة القصوى في تحقيق أهدافك',
                ],
            ],
            [
                'image' => 'img/technical-support.png',
                'title' => [
                    'en' => 'Product Support',
                    'ar' => 'دعم المنتج',
                ],
                'caption' => [
                    'en' => 'We are here to support you throughout your product management journey by providing continuous support and timely issue resolution',
                    'ar' => 'نحن هنا لندعمك طوال رحلتك في إدارة المنتج من خلال تقديم الدعم المستمر وحل المشكلات في الوقت المناسب',
                ],
            ],
            [
                'image' => 'img/cycle.png',
                'title' => [
                    'en' => 'Change Management',
                    'ar' => 'إدارة التغيير',
                ],
                'caption' => [
                    'en' => 'Enable precise and effective changes to your products without any hassle with our change management tool',
                    'ar' => 'تمكين إدارة التغييرات الدقيقة والفعالة على منتجاتك دون أي متاعب',
                ],
            ],
            [
                'image' => 'img/help.png',
                'title' => [
                    'en' => 'Team Collaboration',
                    'ar' => 'التعاون بين الفرق',
                ],
                'caption' => [
                    'en' => 'Foster team collaboration and enhance communication to ensure seamless execution of projects and ideas',
                    'ar' => 'تعزيز التعاون بين الفرق وتعزيز التواصل لضمان تنفيذ سلس للمشاريع والأفكار',
                ],
            ],
            [
                'image' => 'img/checklist.png',
                'title' => [
                    'en' => 'Product Documentation',
                    'ar' => '>وثائق المنتج',
                ],
                'caption' => [
                    'en' => 'Manage all your product documentation easily and efficiently in one centralized location',
                    'ar' => 'إدارة جميع وثائق منتجك بسهولة وفعالية في مكان واحد مركزي',
                ],
            ],
            [
                'image' => 'img/dashboard.png',
                'title' => [
                    'en' => 'Product Reporting',
                    'ar' => 'تقارير المنتج',
                ],
                'caption' => [
                    'en' => 'Gain comprehensive insights into the performance of your products through detailed and customized reports',
                    'ar' => 'الحصول على رؤى شاملة حول أداء منتجاتك من خلال تقارير مفصلة ومخصصة',
                ],
            ],
            [
                'image' => 'img/release.png',
                'title' => [
                    'en' => 'Product Release Management',
                    'ar' => 'إدارة إصدار المنتج',
                ],
                'caption' => [
                    'en' => 'Organize the product release process efficiently to ensure smooth and effective delivery',
                    'ar' => 'تنظيم عملية إصدار المنتج بكفاءة لضمان تسليم سلس وفعّال',
                ],
            ],
            [
                'image' => 'img/bank-account.png',
                'title' => [
                    'en' => 'Product History',
                    'ar' => 'تاريخ المنتج',
                ],
                'caption' => [
                    'en' => 'Track the history of your product and changes with precision and transparency',
                    'ar' => 'تتبع تاريخ منتجك وتاريخ التغييرات بدقة وشفافية',
                ],
            ],
            [
                'image' => 'img/delivered.png',
                'title' => [
                    'en' => 'Product Delivery with Multi-Product Support',
                    'ar' => 'تسليم المنتج مع دعم لعدة منتجات',
                ],
                'caption' => [
                    'en' => 'Manage the product delivery process efficiently and effectively with the ability to support multiple products simultaneously',
                    'ar' => 'إدارة عملية تسليم المنتج بكفاءة وفعالية مع القدرة على دعم عدة منتجات في نفس الوقت',
                ],
            ],
        ];

        foreach ($features as $feature) {
            \App\Models\Feature::create($feature);
        }
    }

}
