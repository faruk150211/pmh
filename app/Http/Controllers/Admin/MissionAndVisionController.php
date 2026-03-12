<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MissionAndVision;
use Illuminate\Http\Request;

class MissionAndVisionController extends Controller
{
    /**
     * Display the mission and vision edit form.
     */
    public function index()
    {
        $missionVision = MissionAndVision::first() ?? new MissionAndVision();

        return view('backend.mission-and-vision.index', compact('missionVision'));
    }

    /**
     * Update the mission and vision content.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'heading_en' => 'nullable|string|max:255',
            'heading_bn' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_bn' => 'nullable|string',
            'mission_heading_en' => 'nullable|string|max:255',
            'mission_heading_bn' => 'nullable|string|max:255',
            'mission_content_en' => 'nullable|string',
            'mission_content_bn' => 'nullable|string',
            'mission_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'vision_heading_en' => 'nullable|string|max:255',
            'vision_heading_bn' => 'nullable|string|max:255',
            'vision_content_en' => 'nullable|string',
            'vision_content_bn' => 'nullable|string',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'commitment_heading_en' => 'nullable|string|max:255',
            'commitment_heading_bn' => 'nullable|string|max:255',
            'commitment_description_en' => 'nullable|string',
            'commitment_description_bn' => 'nullable|string',
        ]);

        // Validate commitment items
        for ($i = 1; $i <= 4; $i++) {
            $validated['commitment_' . $i . '_icon'] = $request->input('commitment_' . $i . '_icon');
            $validated['commitment_' . $i . '_title_en'] = $request->input('commitment_' . $i . '_title_en');
            $validated['commitment_' . $i . '_title_bn'] = $request->input('commitment_' . $i . '_title_bn');
            $validated['commitment_' . $i . '_description_en'] = $request->input('commitment_' . $i . '_description_en');
            $validated['commitment_' . $i . '_description_bn'] = $request->input('commitment_' . $i . '_description_bn');
        }

        $missionVision = MissionAndVision::firstOrCreate([], []);

        // Handle image uploads
        if ($request->hasFile('mission_image')) {
            $validated['mission_image'] = $request->file('mission_image')->store('mission-vision', 'public');
        }

        if ($request->hasFile('vision_image')) {
            $validated['vision_image'] = $request->file('vision_image')->store('mission-vision', 'public');
        }

        $missionVision->update(array_filter($validated));

        return redirect()->back()->with('success', 'Mission & Vision content updated successfully!');
    }
}
