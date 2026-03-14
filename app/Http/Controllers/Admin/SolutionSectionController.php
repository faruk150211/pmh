<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SolutionSection;
use Illuminate\Http\Request;

class SolutionSectionController extends Controller
{
    /**
     * Show the form for editing the solution section.
     */
    public function edit()
    {
        $solutionSection = SolutionSection::first() ?? new SolutionSection();
        return view('backend.solution-section.edit', compact('solutionSection'));
    }

    /**
     * Update the solution section in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_en' => 'nullable|string|max:100',
            'badge_bn' => 'nullable|string|max:100',
            'title_en' => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            // Solution 1
            'solution_1_title_en' => 'nullable|string|max:100',
            'solution_1_title_bn' => 'nullable|string|max:100',
            'solution_1_description_en' => 'nullable|string',
            'solution_1_description_bn' => 'nullable|string',
            'solution_1_icon' => 'nullable|string|max:50',
            // Solution 2
            'solution_2_title_en' => 'nullable|string|max:100',
            'solution_2_title_bn' => 'nullable|string|max:100',
            'solution_2_description_en' => 'nullable|string',
            'solution_2_description_bn' => 'nullable|string',
            'solution_2_icon' => 'nullable|string|max:50',
            // Solution 3
            'solution_3_title_en' => 'nullable|string|max:100',
            'solution_3_title_bn' => 'nullable|string|max:100',
            'solution_3_description_en' => 'nullable|string',
            'solution_3_description_bn' => 'nullable|string',
            'solution_3_icon' => 'nullable|string|max:50',
            // Solution 4
            'solution_4_title_en' => 'nullable|string|max:100',
            'solution_4_title_bn' => 'nullable|string|max:100',
            'solution_4_description_en' => 'nullable|string',
            'solution_4_description_bn' => 'nullable|string',
            'solution_4_icon' => 'nullable|string|max:50',
            // Solution 5
            'solution_5_title_en' => 'nullable|string|max:100',
            'solution_5_title_bn' => 'nullable|string|max:100',
            'solution_5_description_en' => 'nullable|string',
            'solution_5_description_bn' => 'nullable|string',
            'solution_5_icon' => 'nullable|string|max:50',
            // Solution 6
            'solution_6_title_en' => 'nullable|string|max:100',
            'solution_6_title_bn' => 'nullable|string|max:100',
            'solution_6_description_en' => 'nullable|string',
            'solution_6_description_bn' => 'nullable|string',
            'solution_6_icon' => 'nullable|string|max:50',
        ]);

        $solutionSection = SolutionSection::first() ?? new SolutionSection();
        $solutionSection->fill($validated)->save();

        return redirect()->route('admin.solution-section.edit')->with('success', 'Solution Section updated successfully!');
    }
}
