<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display the about us edit form.
     */
    public function index()
    {
        $aboutUs = AboutUs::first() ?? new AboutUs();

        return view('backend.about-us.index', compact('aboutUs'));
    }

    /**
     * Update the about us content.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'heading_en' => 'nullable|string|max:255',
            'heading_bn' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_bn' => 'nullable|string',
            'main_title_en' => 'nullable|string|max:255',
            'main_title_bn' => 'nullable|string|max:255',
            'main_lead_en' => 'nullable|string',
            'main_lead_bn' => 'nullable|string',
            'main_description_en' => 'nullable|string',
            'main_description_bn' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'floating_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'stat_1_value' => 'nullable|string|max:10',
            'stat_1_label_en' => 'nullable|string|max:255',
            'stat_1_label_bn' => 'nullable|string|max:255',
            'stat_2_value' => 'nullable|string|max:10',
            'stat_2_label_en' => 'nullable|string|max:255',
            'stat_2_label_bn' => 'nullable|string|max:255',
            'stat_3_value' => 'nullable|string|max:10',
            'stat_3_label_en' => 'nullable|string|max:255',
            'stat_3_label_bn' => 'nullable|string|max:255',
            'values_heading_en' => 'nullable|string|max:255',
            'values_heading_bn' => 'nullable|string|max:255',
            'values_description_en' => 'nullable|string',
            'values_description_bn' => 'nullable|string',
            'value_1_title_en' => 'nullable|string|max:255',
            'value_1_title_bn' => 'nullable|string|max:255',
            'value_1_description_en' => 'nullable|string',
            'value_1_description_bn' => 'nullable|string',
            'value_2_title_en' => 'nullable|string|max:255',
            'value_2_title_bn' => 'nullable|string|max:255',
            'value_2_description_en' => 'nullable|string',
            'value_2_description_bn' => 'nullable|string',
            'value_3_title_en' => 'nullable|string|max:255',
            'value_3_title_bn' => 'nullable|string|max:255',
            'value_3_description_en' => 'nullable|string',
            'value_3_description_bn' => 'nullable|string',
            'value_4_title_en' => 'nullable|string|max:255',
            'value_4_title_bn' => 'nullable|string|max:255',
            'value_4_description_en' => 'nullable|string',
            'value_4_description_bn' => 'nullable|string',
            'certifications_heading_en' => 'nullable|string|max:255',
            'certifications_heading_bn' => 'nullable|string|max:255',
            'certifications_description_en' => 'nullable|string',
            'certifications_description_bn' => 'nullable|string',
            'cert_1_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'cert_2_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'cert_3_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'cert_4_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'cert_5_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $aboutUs = AboutUs::firstOrCreate([], []);

        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('about', 'public');
        }

        if ($request->hasFile('floating_image')) {
            $validated['floating_image'] = $request->file('floating_image')->store('about', 'public');
        }

        for ($i = 1; $i <= 5; $i++) {
            $certKey = 'cert_' . $i . '_image';
            if ($request->hasFile($certKey)) {
                $validated[$certKey] = $request->file($certKey)->store('certifications', 'public');
            }
        }

        $aboutUs->update(array_filter($validated));

        return redirect()->back()->with('success', 'About Us content updated successfully!');
    }
}
