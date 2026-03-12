<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    /**
     * Show the form for editing the hero section.
     */
    public function edit()
    {
        $heroSection = HeroSection::first() ?? new HeroSection();
        return view('backend.hero-section.edit', compact('heroSection'));
    }

    /**
     * Update the hero section in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'badge_1_en' => 'nullable|string|max:100',
            'badge_1_bn' => 'nullable|string|max:100',
            'badge_2_en' => 'nullable|string|max:100',
            'badge_2_bn' => 'nullable|string|max:100',
            'badge_3_en' => 'nullable|string|max:100',
            'badge_3_bn' => 'nullable|string|max:100',
            'stat_1_label_en' => 'nullable|string|max:100',
            'stat_1_label_bn' => 'nullable|string|max:100',
            'stat_1_en_value' => 'nullable|string|max:100',
            'stat_1_bn_value' => 'nullable|string|max:100',
            'stat_2_label_en' => 'nullable|string|max:100',
            'stat_2_label_bn' => 'nullable|string|max:100',
            'stat_2_en_value' => 'nullable|string|max:100',
            'stat_2_bn_value' => 'nullable|string|max:100',
            'stat_3_label_en' => 'nullable|string|max:100',
            'stat_3_label_bn' => 'nullable|string|max:100',
            'stat_3_en_value' => 'nullable|string|max:100',
            'stat_3_bn_value' => 'nullable|string|max:100',
            'emergency_hotline' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $heroSection = HeroSection::first() ?? new HeroSection();

        if ($request->hasFile('image')) {
            if ($heroSection->image && file_exists(public_path($heroSection->image))) {
                unlink(public_path($heroSection->image));
            }
            $imagePath = $request->file('image')->store('hero', 'public');
            $validated['image'] = 'storage/' . $imagePath;
        }

        $heroSection->fill($validated)->save();

        return redirect()->route('admin.hero-section.edit')->with('success', 'Hero Section updated successfully!');
    }
}
