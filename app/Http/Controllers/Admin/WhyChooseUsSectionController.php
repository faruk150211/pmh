<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUsSection;
use Illuminate\Http\Request;

class WhyChooseUsSectionController extends Controller
{
    /**
     * Show the form for editing the why choose us section.
     */
    public function edit()
    {
        $whyChooseUsSection = WhyChooseUsSection::first() ?? new WhyChooseUsSection();
        return view('backend.why-choose-us-section.edit', compact('whyChooseUsSection'));
    }

    /**
     * Update the why choose us section in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_en' => 'nullable|string|max:100',
            'badge_bn' => 'nullable|string|max:100',
            'title_en' => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            // Card 1
            'card_1_title_en' => 'nullable|string|max:100',
            'card_1_title_bn' => 'nullable|string|max:100',
            'card_1_description_en' => 'nullable|string',
            'card_1_description_bn' => 'nullable|string',
            'card_1_icon' => 'nullable|string|max:50',
            // Card 2
            'card_2_title_en' => 'nullable|string|max:100',
            'card_2_title_bn' => 'nullable|string|max:100',
            'card_2_description_en' => 'nullable|string',
            'card_2_description_bn' => 'nullable|string',
            'card_2_icon' => 'nullable|string|max:50',
            // Card 3
            'card_3_title_en' => 'nullable|string|max:100',
            'card_3_title_bn' => 'nullable|string|max:100',
            'card_3_description_en' => 'nullable|string',
            'card_3_description_bn' => 'nullable|string',
            'card_3_icon' => 'nullable|string|max:50',
            // Card 4
            'card_4_title_en' => 'nullable|string|max:100',
            'card_4_title_bn' => 'nullable|string|max:100',
            'card_4_description_en' => 'nullable|string',
            'card_4_description_bn' => 'nullable|string',
            'card_4_icon' => 'nullable|string|max:50',
            // Stats
            'stat_1_number' => 'nullable|integer',
            'stat_1_label_en' => 'nullable|string|max:100',
            'stat_1_label_bn' => 'nullable|string|max:100',
            'stat_2_number' => 'nullable|integer',
            'stat_2_label_en' => 'nullable|string|max:100',
            'stat_2_label_bn' => 'nullable|string|max:100',
            'stat_3_number' => 'nullable|integer',
            'stat_3_label_en' => 'nullable|string|max:100',
            'stat_3_label_bn' => 'nullable|string|max:100',
        ]);

        $whyChooseUsSection = WhyChooseUsSection::first() ?? new WhyChooseUsSection();
        $whyChooseUsSection->fill($validated)->save();

        return redirect()->route('admin.why-choose-us-section.edit')->with('success', 'Why Choose Us Section updated successfully!');
    }
}
