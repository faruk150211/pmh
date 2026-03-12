# Logo & Favicon Management Guide

## Overview
Your website now uses dynamic logo and favicon settings managed through the admin panel.

## Current Settings

| Setting | URL | Location |
|---------|-----|----------|
| **Logo** | `logo_url` | `/frontend/assets/img/logo.webp` |
| **Favicon** | `favicon_url` | `/favicon.ico` |
| **Logo Alt Text** | `site_logo_alt_text` | Settings Database |

## File Locations

- **Logo File**: `public/frontend/assets/img/logo.webp`
- **Favicon File**: `public/favicon.ico`

## How to Change Logo

### Method 1: Through Admin Panel
1. Go to Admin Panel → Settings
2. Search for `logo_url` setting
3. Click **Edit**
4. Update the value to your new logo path (e.g., `/frontend/assets/img/my-logo.png`)
5. Click **Update Setting**

### Method 2: Replace File Directly
1. Upload your new logo image to `public/frontend/assets/img/`
2. The existing path (`/frontend/assets/img/logo.webp`) will use your new file

## How to Change Favicon

### Method 1: Through Admin Panel
1. Go to Admin Panel → Settings
2. Search for `favicon_url` setting
3. Click **Edit**
4. Update the value to your new favicon path (e.g., `/favicon.png`)
5. Click **Update Setting**

### Method 2: Replace File Directly
1. Replace `public/favicon.ico` with your new favicon file
2. Or upload a new file and update the setting path

## Recommended Logo Sizes

- **Main Logo**: 300x150px (or proportional)
- **Mobile Logo**: 150x75px
- **Format**: PNG, WebP, or SVG (recommended for scalability)

## Recommended Favicon Sizes

- **Traditional**: 16x16px or 32x32px (favicon.ico)
- **Apple Touch Icon**: 180x180px
- **Format**: ICO, PNG, or WebP

## Logo in Header

The logo is dynamically displayed in the header with:
- **Image URL**: From `logo_url` setting
- **Alt Text**: From `site_logo_alt_text` setting
- **Site Name**: From `site_name` setting (displayed next to logo)

## Favicon in Browser

- Appears in browser tabs
- Bookmark identification
- URL bar (in some browsers)
- History

## Making Logo Optional

If you want to show only text without image:

1. Go to Admin Panel → Settings
2. Search for `logo_url`
3. Click **Edit** and clear the value (leave empty)
4. Update the setting

The header will then show only the site name without an image.

## Upload New Logo via File Upload

To add file upload capability, follow these steps:

### Step 1: Create Upload Directory
```bash
mkdir -p public/storage/uploads
chmod 755 public/storage/uploads
```

### Step 2: Create Upload Field in Settings Form

Add this to the **create.blade.php** or create a new "Branding" admin page:

```blade
<div class="form-group">
    <label for="logo_file">Upload Logo Image</label>
    <input type="file" class="form-control" id="logo_file" name="logo_file" accept="image/*">
    <small class="form-text text-muted">Supported: JPG, PNG, WebP, SVG</small>
</div>
```

### Step 3: Handle Upload in Controller

```php
if ($request->hasFile('logo_file')) {
    $path = $request->file('logo_file')->store('uploads', 'public');
    Settings::setSetting('logo_url', '/storage/' . $path);
}
```

## Dynamic Integration in Frontend

### In Blade Templates
```blade
<img src="{{ asset(setting('logo_url')) }}" alt="{{ setting('site_logo_alt_text') }}">
```

### In CSS/JavaScript
```javascript
const logoUrl = document.querySelector('img[alt="{{ setting("site_logo_alt_text") }}"]').src;
```

## Clear Browser Cache

After changing favicon:
1. Clear browser cache (Ctrl+Shift+Delete)
2. Or do hard refresh (Ctrl+F5)
3. Favicon may take time to update in tabs

## Usage Helpers

Access in your code:

```php
// Get logo URL
$logo = setting('logo_url');

// Get favicon URL
$favicon = setting('favicon_url');

// Get logo alt text
$altText = setting('site_logo_alt_text');

// Change logo programmatically
updateSetting('logo_url', '/path/to/new-logo.png');
```

## Troubleshooting

### Logo Not Showing
- Check file path exists at: `public/` + `{setting_value}`
- Verify file permissions (readable)
- Clear browser cache
- Check image format is supported

### Favicon Not Updating
- Hard refresh browser (Ctrl+F5)
- Clear browser cache completely
- Check file is accessible at path
- Favicon cache can persist for hours

### File Upload Errors
- Check file size (recommend < 2MB)
- Verify directory permissions
- Ensure file format is image
- Check disk space

## Related Settings

- `site_name` - Website name displayed next to logo
- `theme_color` - Primary brand color
- `site_description` - Meta description
- `seo_meta_keywords` - SEO keywords

---

**Last Updated**: March 6, 2026
