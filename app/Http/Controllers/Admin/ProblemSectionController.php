<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProblemSection;
use Illuminate\Http\Request;

class ProblemSectionController extends Controller
{
    /**
     * Show the form for editing the problem section.
     */
    public function edit()
    {
        $problemSection = ProblemSection::first() ?? new ProblemSection();
        return view('backend.problem-section.edit', compact('problemSection'));
    }

    /**
     * Update the problem section in storage.
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
            // Problem 1
            'problem_1_title_en' => 'nullable|string|max:100',
            'problem_1_title_bn' => 'nullable|string|max:100',
            'problem_1_description_en' => 'nullable|string',
            'problem_1_description_bn' => 'nullable|string',
            'problem_1_icon' => 'nullable|string|max:50',
            // Problem 2
            'problem_2_title_en' => 'nullable|string|max:100',
            'problem_2_title_bn' => 'nullable|string|max:100',
            'problem_2_description_en' => 'nullable|string',
            'problem_2_description_bn' => 'nullable|string',
            'problem_2_icon' => 'nullable|string|max:50',
            // Problem 3
            'problem_3_title_en' => 'nullable|string|max:100',
            'problem_3_title_bn' => 'nullable|string|max:100',
            'problem_3_description_en' => 'nullable|string',
            'problem_3_description_bn' => 'nullable|string',
            'problem_3_icon' => 'nullable|string|max:50',
            // Problem 4
            'problem_4_title_en' => 'nullable|string|max:100',
            'problem_4_title_bn' => 'nullable|string|max:100',
            'problem_4_description_en' => 'nullable|string',
            'problem_4_description_bn' => 'nullable|string',
            'problem_4_icon' => 'nullable|string|max:50',
        ]);

        $problemSection = ProblemSection::first() ?? new ProblemSection();
        $problemSection->fill($validated)->save();

        return redirect()->route('admin.problem-section.edit')->with('success', 'Problem Section updated successfully!');
    }
}
