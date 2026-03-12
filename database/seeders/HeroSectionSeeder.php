<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::create([
            'title_en' => 'Excellence in Healthcare With Compassionate Care',
            'title_bn' => 'স্বাস্থ্যসেবায় উৎকর্ষতা এবং দয়ালু যত্ন',
            'description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.',
            'description_bn' => 'লরেম ইপসাম ডলর সিট আমেট, কনসেক্টেটুর অ্যাডিপিসিং এলিট। সেড ডু ইউসমোড টেম্পর ইনসিডিডান্ট উট ল্যাবোর এট ডোলোর ম্যাগনা অ্যালিকুয়া।',
            'image' => 'frontend/assets/img/health/staff-10.webp',
            'badge_1' => 'Accredited',
            'badge_2' => '24/7 Emergency',
            'badge_3' => '4.9/5 Rating',
            'stat_1_label_en' => 'Years Experience',
            'stat_1_label_bn' => 'বছরের অভিজ্ঞতা',
            'stat_1_value' => '15',
            'stat_2_label_en' => 'Patients Treated',
            'stat_2_label_bn' => 'রোগী চিকিৎসা করা',
            'stat_2_value' => '5000',
            'stat_3_label_en' => 'Medical Experts',
            'stat_3_label_bn' => 'চিকিৎসা বিশেষজ্ঞ',
            'stat_3_value' => '50',
            'emergency_hotline' => '+1 (555) 911-2468',
        ]);
    }
}
