<?php

/**
 * FRONTEND USAGE EXAMPLES FOR DYNAMIC SETTINGS
 *
 * This file demonstrates how to use the dynamic settings system
 * in your application's frontend.
 */

// ===================================================================
// EXAMPLE 1: Using Settings in a Main Layout/Header Component
// ===================================================================
?>

{{-- In resources/views/frontend/layouts/header.blade.php --}}

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <!-- Site Logo/Name -->
            <h1 class="site-name">{{ setting('site_name') }}</h1>
            <p class="site-tagline">{{ setting('site_tagline') }}</p>
        </div>
    </div>
</header>

<?php

// ===================================================================
// EXAMPLE 2: Using Settings in Footer
// ===================================================================
?>

{{-- In resources/views/frontend/layouts/footer.blade.php --}}

<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contact Info</h3>
                <ul class="contact-list">
                    <li>
                        <strong>Email:</strong>
                        <a href="mailto:{{ setting('contact_email') }}">
                            {{ setting('contact_email') }}
                        </a>
                    </li>
                    <li>
                        <strong>Phone:</strong>
                        <a href="tel:{{ setting('contact_phone') }}">
                            {{ setting('contact_phone') }}
                        </a>
                    </li>
                    <li>
                        <strong>Address:</strong>
                        {{ setting('contact_address') }}
                    </li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Hours</h3>
                <div class="business-hours">
                    {!! nl2br(setting('contact_hours')) !!}
                </div>
            </div>

            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="{{ setting('social_facebook') }}" target="_blank">
                        <i class="fab fa-facebook"></i> Facebook
                    </a>
                    <a href="{{ setting('social_twitter') }}" target="_blank">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                    <a href="{{ setting('social_linkedin') }}" target="_blank">
                        <i class="fab fa-linkedin"></i> LinkedIn
                    </a>
                    <a href="{{ setting('social_instagram') }}" target="_blank">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php

// ===================================================================
// EXAMPLE 3: Using Settings in a Controller
// ===================================================================
?>

<?php
/**
 * In app/Http/Controllers/HomeController.php
 */

use App\Models\Settings;

class HomeController extends Controller
{
    public function index()
    {
        $siteSettings = [
            'name' => setting('site_name'),
            'description' => setting('site_description'),
            'tagline' => setting('site_tagline'),
        ];

        // Get all contact settings
        $contactSettings = getSettings('contact');

        return view('frontend.home', compact('siteSettings', 'contactSettings'));
    }

    public function contact()
    {
        $contactEmail = setting('contact_email');
        $contactPhone = setting('contact_phone');

        return view('frontend.contact', compact('contactEmail', 'contactPhone'));
    }
}

// ===================================================================
// EXAMPLE 4: Using Settings in Email Templates
// ===================================================================
?>

{{-- In resources/views/emails/contact-reply.blade.php --}}

<x-mail::message>
Hello {{ $name }},

Thank you for contacting {{ setting('site_name') }}!

We have received your message and will get back to you as soon as possible.

**Our Contact Information:**
- Email: {{ setting('contact_email') }}
- Phone: {{ setting('contact_phone') }}
- Hours: {{ setting('contact_hours') }}

Best regards,<br>
{{ setting('email_from_name') }} Team

<x-mail::button url="{{ url('/') }}">
Visit Our Website
</x-mail::button>
</x-mail::message>

<?php

// ===================================================================
// EXAMPLE 5: Dynamic Meta Tags in Head
// ===================================================================
?>

{{-- In resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Meta Tags from Settings --}}
    <title>{{ $pageTitle ?? setting('site_name') }}</title>
    <meta name="description" content="{{ $pageDescription ?? setting('site_description') }}">
    <meta name="keywords" content="{{ setting('seo_meta_keywords') }}">
    <meta name="theme-color" content="{{ setting('theme_color', '#007bff') }}">

    {{-- Open Graph Tags --}}
    <meta property="og:title" content="{{ $pageTitle ?? setting('site_name') }}">
    <meta property="og:description" content="{{ $pageDescription ?? setting('site_description') }}">
    <meta property="og:url" content="{{ request()->url() }}">

    {{-- Dynamic CSS for Theme Color --}}
    <style>
        :root {
            --primary-color: {{ setting('theme_color', '#007bff') }};
        }
    </style>
</head>
<body>
    @include('frontend.layouts.header')

    <main>
        {{ $slot ?? '' }}
    </main>

    @include('frontend.layouts.footer')
</body>
</html>

<?php

// ===================================================================
// EXAMPLE 6: Conditional Features Based on Settings
// ===================================================================
?>

{{-- In any view --}}

@if (setting('enable_comments'))
    <div class="comments-section">
        @include('frontend.components.comments')
    </div>
@endif

@if (setting('enable_sitemap'))
    <link rel="sitemap" type="application/xml" href="{{ url('/sitemap.xml') }}">
@endif

<?php

// ===================================================================
// EXAMPLE 7: Using Settings in API Responses
// ===================================================================
?>

<?php
/**
 * In app/Http/Controllers/Api/SettingsController.php
 */

class SettingsController extends Controller
{
    public function getPublicSettings()
    {
        return response()->json([
            'site_name' => setting('site_name'),
            'site_description' => setting('site_description'),
            'site_tagline' => setting('site_tagline'),
            'contact_email' => setting('contact_email'),
            'contact_phone' => setting('contact_phone'),
            'social_links' => [
                'facebook' => setting('social_facebook'),
                'twitter' => setting('social_twitter'),
                'linkedin' => setting('social_linkedin'),
                'instagram' => setting('social_instagram'),
            ]
        ]);
    }
}

// ===================================================================
// EXAMPLE 8: Service Class Using Settings
// ===================================================================
?>

<?php
/**
 * In app/Services/EmailService.php
 */

class EmailService
{
    public function sendNotification($user, $message)
    {
        Mail::send('emails.notification', ['message' => $message], function ($mail) {
            $mail->from(setting('email_from_address'), setting('email_from_name'));
            $mail->to($user->email);
            $mail->subject('Notification from ' . setting('site_name'));
        });
    }

    public function getContactEmail()
    {
        return setting('contact_email', config('mail.from.address'));
    }

    public function getBusinessHours()
    {
        return setting('contact_hours');
    }
}

// ===================================================================
// EXAMPLE 9: Settings in Middleware
// ===================================================================
?>

<?php
/**
 * In app/Http/Middleware/CheckMaintenanceMode.php
 */

class CheckMaintenanceMode
{
    public function handle($request, $next)
    {
        if (setting('maintenance_mode_enabled')) {
            return response()->view('maintenance', [], 503);
        }

        return $next($request);
    }
}

// ===================================================================
// EXAMPLE 10: Caching Settings for Better Performance
// ===================================================================
?>

<?php
/**
 * Create app/Helpers/CachedSettings.php for better performance
 */

class CachedSettings
{
    /**
     * Get a setting with caching
     */
    public static function get($key, $default = null, $minutes = 60)
    {
        return cache()->remember("setting_$key", $minutes * 60, function () use ($key, $default) {
            return Settings::getSetting($key, $default);
        });
    }

    /**
     * Clear all setting cache
     */
    public static function clearCache()
    {
        cache()->flush();
    }

    /**
     * Get all settings by category with caching
     */
    public static function getByCategory($category, $minutes = 60)
    {
        return cache()->remember("settings_category_$category", $minutes * 60, function () use ($category) {
            return getSettings($category);
        });
    }
}

// Usage:
// $siteName = CachedSettings::get('site_name');
// CachedSettings::clearCache(); // Clear after updating settings
?>

{{-- ===================================================================
    EXAMPLE 11: Contact Form with Dynamic Settings
    =================================================================== --}}

{{-- In resources/views/frontend/contact.blade.php --}}

<form method="POST" action="{{ route('contact.store') }}">
    @csrf

    <div class="form-group">
        <label for="email">Your Email</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Send Message</button>

    <p class="text-muted mt-3">
        For urgent matters, please call us at:
        <a href="tel:{{ setting('contact_phone') }}">{{ setting('contact_phone') }}</a>
    </p>
</form>

<?php

// ===================================================================
// EXAMPLE 12: Settings in Blade Components
// ===================================================================
?>

{{-- Create resources/views/components/site-info.blade.php --}}

<div class="site-info {{ $class ?? '' }}">
    <h3>{{ setting('site_name') }}</h3>
    <p class="tagline">{{ setting('site_tagline') }}</p>
    <p>{{ setting('site_description') }}</p>
</div>

{{-- Usage in views: --}}
<x-site-info class="mb-4" />
