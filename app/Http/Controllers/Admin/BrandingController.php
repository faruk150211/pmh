<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandingController extends Controller
{
    /**
     * Show the branding dashboard
     */
    public function index()
    {
        $logo = Settings::getSetting('logo_url', '/frontend/assets/img/logo.webp');
        $favicon = Settings::getSetting('favicon_url', '/favicon.ico');
        $siteName = Settings::getSetting('site_name', 'PMH');
        $siteTagline = Settings::getSetting('site_tagline', '');
        $siteDescription = Settings::getSetting('site_description', '');
        $themeColor = Settings::getSetting('theme_color', '#007bff');

        return view('backend.branding.index', compact('logo', 'favicon', 'siteName', 'siteTagline', 'siteDescription', 'themeColor'));
    }

    /**
     * Upload logo image
     */
    public function uploadLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ], [
            'logo.required' => 'Please select a logo image',
            'logo.mimes' => 'Logo must be: jpeg, png, jpg, gif, webp, or svg',
            'logo.max' => 'Logo image must be less than 2MB',
        ]);

        try {
            $file = $request->file('logo');
            $filename = 'logo-' . time() . '.' . $file->getClientOriginalExtension();

            // Store in public/storage/branding/
            $path = $file->storeAs('branding/logos', $filename, 'public');

            // Save to settings
            Settings::setSetting(
                'logo_url',
                '/storage/' . $path,
                'Website logo',
                'appearance',
                'text'
            );

            return redirect()->route('admin.branding.index')
                           ->with('success', 'Logo uploaded successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to upload logo: ' . $e->getMessage());
        }
    }

    /**
     * Upload favicon image
     */
    public function uploadFavicon(Request $request)
    {
        $request->validate([
            'favicon' => 'required|mimes:ico,png,jpg,jpeg,gif,webp|max:512',
        ], [
            'favicon.required' => 'Please select a favicon image',
            'favicon.mimes' => 'Favicon must be: ico, png, jpg, jpeg, gif, or webp',
            'favicon.max' => 'Favicon image must be less than 512KB',
        ]);

        try {
            $file = $request->file('favicon');
            $filename = 'favicon-' . time() . '.' . $file->getClientOriginalExtension();

            // Store in public/storage/branding/
            $path = $file->storeAs('branding/favicons', $filename, 'public');

            // Save to settings
            Settings::setSetting(
                'favicon_url',
                '/storage/' . $path,
                'Website favicon',
                'appearance',
                'text'
            );

            return redirect()->route('admin.branding.index')
                           ->with('success', 'Favicon uploaded successfully! (Hard refresh browser to see changes)');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to upload favicon: ' . $e->getMessage());
        }
    }

    /**
     * Delete logo
     */
    public function deleteLogo()
    {
        try {
            // Reset to default
            Settings::setSetting(
                'logo_url',
                '/frontend/assets/img/logo.webp',
                'Website logo',
                'appearance',
                'text'
            );

            return redirect()->route('admin.branding.index')
                           ->with('success', 'Logo reset to default');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to delete logo: ' . $e->getMessage());
        }
    }

    /**
     * Delete favicon
     */
    public function deleteFavicon()
    {
        try {
            // Reset to default
            Settings::setSetting(
                'favicon_url',
                '/favicon.ico',
                'Website favicon',
                'appearance',
                'text'
            );

            return redirect()->route('admin.branding.index')
                           ->with('success', 'Favicon reset to default');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to delete favicon: ' . $e->getMessage());
        }
    }

    /**
     * Update site name and tagline
     */
    public function updateIdentity(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_tagline' => 'required|string|max:255',
            'site_description' => 'required|string|max:1000',
        ]);

        try {
            Settings::setSetting('site_name', $request->site_name, 'Website name', 'general', 'text');
            Settings::setSetting('site_tagline', $request->site_tagline, 'Website tagline', 'general', 'text');
            Settings::setSetting('site_description', $request->site_description, 'Website description', 'general', 'textarea');

            return redirect()->route('admin.branding.index')
                           ->with('success', 'Site identity updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to update site identity: ' . $e->getMessage());
        }
    }
}

