# Dynamic Website Settings System

## Overview

Your Laravel application now has a complete dynamic website settings system. This system allows administrators to manage website configuration through a user-friendly interface rather than hard-coding values.

## Features

- ✅ **CRUD Operations**: Create, Read, Update, and Delete settings
- ✅ **Organized by Categories**: Settings are grouped by category (General, Contact, Email, Social, SEO, Appearance)
- ✅ **Multiple Data Types**: Support for text, textarea, email, number, and boolean values
- ✅ **Easy Access**: Helper functions to retrieve settings from anywhere in your application
- ✅ **Secure**: Protected by admin middleware - only authenticated admins can access
- ✅ **Pre-populated**: Comes with sensible default settings

## File Structure

```
app/
├── Models/
│   └── Settings.php              # Settings model with helper methods
├── Http/Controllers/Admin/
│   └── SettingsController.php     # Controller for managing settings
└── Helpers/
    └── SettingsHelper.php          # Helper functions for settings

resources/views/backend/settings/
├── index.blade.php               # List all settings
├── create.blade.php              # Create new setting form
├── edit.blade.php                # Edit existing setting form
└── show.blade.php                # View single setting

database/
├── migrations/
│   └── 2026_03_06_060838_create_settings_table.php
└── seeders/
    └── SettingsSeeder.php         # Default settings seeder

routes/
└── web.php                        # Settings routes registered
```

## Database Structure

The `settings` table has the following columns:

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| key | string (unique) | Unique setting identifier |
| value | longText | Setting value, can store JSON, text, etc. |
| description | string | Human-readable description |
| category | string | Category for grouping (general, contact, email, etc.) |
| type | string | Data type (text, textarea, email, number, boolean) |
| created_at | timestamp | Created date |
| updated_at | timestamp | Last updated date |

## Available Routes

All routes are protected by auth and admin middleware.

```
GET    /admin/settings              # List all settings
GET    /admin/settings/create       # Show create form
POST   /admin/settings              # Store new setting
GET    /admin/settings/{id}         # Show single setting
GET    /admin/settings/{id}/edit    # Show edit form
PUT    /admin/settings/{id}         # Update setting
DELETE /admin/settings/{id}         # Delete setting
POST   /admin/settings/update-multiple  # Update multiple settings at once
```

## Usage Examples

### 1. Getting Settings in Your Code

```php
// In a controller
use App\Models\Settings;

// Method 1: Using the helper function
$siteName = setting('site_name');
$contactEmail = setting('contact_email', 'default@example.com');

// Method 2: Using the model directly
$siteName = Settings::getSetting('site_name');

// Method 3: Get all settings by category
$contactSettings = getSettings('contact');

// Method 4: Get all settings
$allSettings = Settings::all();
```

### 2. Setting Values Programmatically

```php
// Update or create a setting
Settings::setSetting('site_name', 'New Site Name', 'Website name', 'general', 'text');

// Using helper function
updateSetting('site_name', 'New Site Name', 'Website name', 'general', 'text');
```

### 3. In Blade Templates

```blade
<h1>{{ setting('site_name') }}</h1>
<p>{{ setting('site_description') }}</p>
<a href="mailto:{{ setting('contact_email') }}">Contact Us</a>
```

### 4. Accessing Settings by Category

```php
$emailSettings = getSettings('email');
$socialSettings = getSettings('social');
```

## Default Settings Included

### General
- `site_name` - Website name
- `site_tagline` - Website tagline
- `site_description` - Website description

### Contact
- `contact_email` - Primary contact email
- `contact_phone` - Contact phone number
- `contact_address` - Physical address
- `contact_hours` - Business hours

### Email
- `email_from_address` - Email sender address
- `email_from_name` - Email sender name

### Social Media
- `social_facebook` - Facebook URL
- `social_twitter` - Twitter URL
- `social_linkedin` - LinkedIn URL
- `social_instagram` - Instagram URL

### SEO
- `seo_meta_keywords` - Meta keywords
- `enable_sitemap` - Enable XML sitemap

### Appearance
- `theme_color` - Primary theme color
- `items_per_page` - Pagination items
- `enable_comments` - Enable user comments

## Adding New Settings

### Via Admin Panel
1. Go to Admin Panel → Settings
2. Click "Add New Setting"
3. Fill in the form with:
   - Setting Key (unique, lowercase with underscores)
   - Value
   - Description
   - Category
   - Type (text, textarea, email, number, boolean)
4. Click "Create Setting"

### Programmatically
```php
use App\Models\Settings;

Settings::setSetting(
    key: 'custom_setting',
    value: 'some value',
    description: 'My custom setting',
    category: 'general',
    type: 'text'
);
```

## Modifying Default Settings

To add more default settings to the seeder:

1. Edit `database/seeders/SettingsSeeder.php`
2. Add your settings to the `$settings` array
3. Run `php artisan db:seed --class=SettingsSeeder`

Or to update an existing default setting:
1. Go to Admin Panel → Settings
2. Find the setting you want to modify
3. Click "Edit"
4. Update the value
5. Click "Update Setting"

## Advanced Usage

### Getting Settings with Caching
```php
// Add caching to improve performance
$siteName = cache()->remember('setting_site_name', 60 * 24, function () {
    return Settings::getSetting('site_name');
});
```

### Updating from Frontend
```php
// In a controller method
public function updateSettings(Request $request)
{
    Settings::setSetting('site_name', $request->input('site_name'));
    Settings::setSetting('site_description', $request->input('site_description'));
    
    return redirect()->back()->with('success', 'Settings updated!');
}
```

### Using Environment-Specific Defaults
```php
// In a service provider
public function boot()
{
    if (!Settings::where('key', 'site_name')->exists()) {
        Settings::setSetting(
            'site_name',
            config('app.name'),
            'Default site name from config',
            'general',
            'text'
        );
    }
}
```

## Security Considerations

1. **Access Control**: All settings routes are protected by `auth` and `admin` middleware
2. **Validation**: All inputs are validated in the controller
3. **Mass Assignment Protection**: Only allowed fields are passed through fillable
4. **Unique Keys**: Setting keys are uniquely constrained to prevent duplicates

## Troubleshooting

### Settings not appearing after seeding
```bash
# Clear the application cache
php artisan cache:clear

# Run the seeder again
php artisan db:seed --class=SettingsSeeder
```

### Helper functions not available
```bash
# Regenerate the autoloader
composer dump-autoload
```

### Settings not updating
1. Check that you're authenticated and have admin privileges
2. Verify the setting key exists or use updateOrCreate
3. Check Laravel logs for validation errors

## Next Steps

1. **Customize Categories**: Add more categories as needed for your application
2. **Add More Settings**: Create settings for your specific needs
3. **Integrate with Frontend**: Use the settings in your public-facing pages
4. **Create Settings Groups**: Group related settings together in views
5. **Add Settings Validation**: Create custom validators for specific settings

## Support

For issues or questions about the settings system, refer to the [Laravel Documentation](https://laravel.com/docs).

---

**Last Updated**: March 6, 2026
