<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::create([
            'name' => 'English',
            'lang' => 'en',
            'slug' => 'en',
            'default' => 1,
            'status' => 1,
        ]);

        Language::create([
            'name' => 'Bangla',
            'lang' => 'bn',
            'slug' => 'bn',
            'default' => 0,
            'status' => 1,
        ]);
    }
}
