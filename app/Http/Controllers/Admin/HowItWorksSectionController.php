<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HowItWorksSection;
use Illuminate\Http\Request;

class HowItWorksSectionController extends Controller
{
    /**
     * Show the form for editing the how it works section.
     */
    public function edit()
    {
        $howItWorksSection = HowItWorksSection::first() ?? new HowItWorksSection();
        return view('backend.how-it-works-section.edit', compact('howItWorksSection'));
    }

    /**
     * Update the how it works section in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_en' => 'nullable|string|max:100',
            'badge_bn' => 'nullable|string|max:100',
            'title_en' => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_bn' => 'nullable|string',
            // Step 1
            'step_1_title_en' => 'nullable|string|max:100',
            'step_1_title_bn' => 'nullable|string|max:100',
            'step_1_description_en' => 'nullable|string',
            'step_1_description_bn' => 'nullable|string',
            'step_1_icon' => 'nullable|string|max:50',
            // Step 2
            'step_2_title_en' => 'nullable|string|max:100',
            'step_2_title_bn' => 'nullable|string|max:100',
            'step_2_description_en' => 'nullable|string',
            'step_2_description_bn' => 'nullable|string',
            'step_2_icon' => 'nullable|string|max:50',
            // Step 3
            'step_3_title_en' => 'nullable|string|max:100',
            'step_3_title_bn' => 'nullable|string|max:100',
            'step_3_description_en' => 'nullable|string',
            'step_3_description_bn' => 'nullable|string',
            'step_3_icon' => 'nullable|string|max:50',
            // Step 4
            'step_4_title_en' => 'nullable|string|max:100',
            'step_4_title_bn' => 'nullable|string|max:100',
            'step_4_description_en' => 'nullable|string',
            'step_4_description_bn' => 'nullable|string',
            'step_4_icon' => 'nullable|string|max:50',
        ]);

        $howItWorksSection = HowItWorksSection::first() ?? new HowItWorksSection();
        $howItWorksSection->fill($validated)->save();

        return redirect()->route('admin.how-it-works-section.edit')->with('success', 'How It Works Section updated successfully!');
    }
}
