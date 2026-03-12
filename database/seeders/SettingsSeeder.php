<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            [
                'key' => 'site_name',
                'value' => 'PMH - Primo Medical & Health',
                'description' => 'Website name',
                'category' => 'general',
                'type' => 'text'
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Quality Healthcare Solutions',
                'description' => 'Website tagline or motto',
                'category' => 'general',
                'type' => 'text'
            ],
            [
                'key' => 'site_description',
                'value' => 'We provide comprehensive healthcare solutions and services.',
                'description' => 'Website description for SEO',
                'category' => 'general',
                'type' => 'textarea'
            ],

            // Contact Settings
            [
                'key' => 'contact_email',
                'value' => 'info@pmh.com',
                'description' => 'Primary contact email',
                'category' => 'contact',
                'type' => 'email'
            ],
            [
                'key' => 'contact_phone',
                'value' => '+1 (555) 000-0000',
                'description' => 'Primary contact phone number',
                'category' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'contact_address',
                'value' => '123 Medical Street, Health City, HC 12345',
                'description' => 'Physical office address',
                'category' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'contact_hours',
                'value' => 'Monday - Friday: 9:00 AM - 5:00 PM\nSaturday: 10:00 AM - 2:00 PM\nSunday: Closed',
                'description' => 'Business hours',
                'category' => 'contact',
                'type' => 'textarea'
            ],

            // Email Settings
            [
                'key' => 'email_from_address',
                'value' => 'noreply@pmh.com',
                'description' => 'Email address for sending notifications',
                'category' => 'email',
                'type' => 'email'
            ],
            [
                'key' => 'email_from_name',
                'value' => 'PMH',
                'description' => 'Name for outgoing emails',
                'category' => 'email',
                'type' => 'text'
            ],

            // Social Media
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/pmh',
                'description' => 'Facebook page URL',
                'category' => 'social',
                'type' => 'text'
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/pmh',
                'description' => 'Twitter profile URL',
                'category' => 'social',
                'type' => 'text'
            ],
            [
                'key' => 'social_linkedin',
                'value' => 'https://linkedin.com/company/pmh',
                'description' => 'LinkedIn profile URL',
                'category' => 'social',
                'type' => 'text'
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://instagram.com/pmh',
                'description' => 'Instagram profile URL',
                'category' => 'social',
                'type' => 'text'
            ],

            // SEO Settings
            [
                'key' => 'seo_meta_keywords',
                'value' => 'healthcare, medical, health services, PMH',
                'description' => 'Default meta keywords for pages',
                'category' => 'seo',
                'type' => 'text'
            ],
            [
                'key' => 'enable_sitemap',
                'value' => '1',
                'description' => 'Enable XML sitemap generation',
                'category' => 'seo',
                'type' => 'boolean'
            ],

            // Appearance Settings
            [
                'key' => 'theme_color',
                'value' => '#007bff',
                'description' => 'Primary theme color',
                'category' => 'appearance',
                'type' => 'text'
            ],
            [
                'key' => 'items_per_page',
                'value' => '10',
                'description' => 'Number of items per page for pagination',
                'category' => 'appearance',
                'type' => 'number'
            ],
            [
                'key' => 'enable_comments',
                'value' => '0',
                'description' => 'Enable/disable user comments',
                'category' => 'appearance',
                'type' => 'boolean'
            ],
            [
                'key' => 'logo_url',
                'value' => '/frontend/assets/img/logo.webp',
                'description' => 'Website logo URL',
                'category' => 'appearance',
                'type' => 'text'
            ],
            [
                'key' => 'favicon_url',
                'value' => '/favicon.ico',
                'description' => 'Website favicon URL',
                'category' => 'appearance',
                'type' => 'text'
            ],
            [
                'key' => 'site_logo_alt_text',
                'value' => 'PMH - Premier Medical HouseCall Logo',
                'description' => 'Alt text for logo image',
                'category' => 'appearance',
                'type' => 'text'
            ],
        ];

        foreach ($settings as $setting) {
            Settings::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}

