<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $home = [
            'image' => 'img/home.png',
            'title' => [
                'en' => 'Join <span class="bold">ProductLapse</span> Now and enjoy an efficient and user-friendly experience in <span>Manage your products</span>',
                'ar' => 'انضم إلى <span class="bold">ProductLapse</span> الآن واستمتع بتجربة فعالة وسهلة في <span>إدارة منتجاتك</span>',
            ],
            'caption' => [
                'en' => 'Start your journey towards success and excellence in the ever-evolving market',
                'ar' => 'ابدأ رحلتك نحو النجاح والتفوق في السوق المتغيرة باستمرار',
            ],
            'button' => [
                'en' => 'Sign up now for a free trial!',
                'ar' => 'اشترك الان',
            ],
        ];


        $about_us = [
            'image' => 'img/about.png',
            'caption' => [
                'en' => 'ProductLapse is a comprehensive product management tool and mobile app designed to empower you in realizing your product vision and achieving remarkable success in the competitive market. <br><br>The platform offers the capability to clearly visualize your product, efficient planning, continuous support, change management, enhanced team collaboration, product documentation, and comprehensive reporting.<br><br>You can also manage the product release process and track its history and delivery with support for multiple products simultaneously.',
                'ar' => ' ProductLapse برودكت لابس هي منصة شاملة لإدارة المنتجات وتطبيق مصمم لتمكينك من تحقيق رؤيتك للمنتج وتحقيق نجاح ملحوظ في السوق التنافسية. <br><br>يوفر هذا النظام القدرة على تصور المنتج بوضوح، والتخطيط الفعّال، والدعم المستمر، وإدارة التغيير، وتعزيز التعاون بين الفرق، ووثائق المنتج، وإعداد التقارير الشاملة. <br><br>يمكنك أيضًا إدارة عملية إصدار المنتج وتتبع تاريخه وتسليمه مع دعم لعدة منتجات في نفس الوقت',
            ],
        ];

        $join = [
            'en' => 'Join now and enjoy an efficient and user-friendly experience<br> in managing your products !',
            'ar' => 'اشترك الان و استمتع بتجربة فعالة وسهلة في إدارة منتجاتك !'
        ];

        $package = [
            'en' => 'Different packages to suit all needs .. Get Started Today !',
            'ar' => 'باقات مختلفه تناسب جميع الاحتياجات .. اشترك الان !',
        ];

        \App\Models\LandingPage::create([
            'home' => $home,
            'about_us' => $about_us,
            'join' => $join,
            'package' => $package,
        ]);
    }
}
