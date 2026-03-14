<?php

namespace App\Http\Controllers\Admin;

use App\Models\Founder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class FounderController extends Controller
{
    public function edit()
    {
        $founder = Founder::first() ?? new Founder();
        return view('backend.founders.edit', compact('founder'));
    }

    public function update(Request $request)
    {
        $founder = Founder::firstOrCreate([]);

        // Prepare data
        $data = $request->only([
            'title_en',
            'title_bn',
            'subtitle_en',
            'subtitle_bn',
            'quote_en',
            'quote_bn',
            'vision_heading_en',
            'vision_heading_bn',
            'vision_description_en',
            'vision_description_bn',
            'highlight_1_title_en',
            'highlight_1_title_bn',
            'highlight_1_description_en',
            'highlight_1_description_bn',
            'highlight_2_title_en',
            'highlight_2_title_bn',
            'highlight_2_description_en',
            'highlight_2_description_bn',
            'highlight_3_title_en',
            'highlight_3_title_bn',
            'highlight_3_description_en',
            'highlight_3_description_bn',
            'badge_label_en',
            'badge_label_bn',
        ]);

        // Handle picture upload
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');

            // Delete old picture if exists
            if ($founder->picture && Storage::disk('public')->exists('founders/' . $founder->picture)) {
                Storage::disk('public')->delete('founders/' . $founder->picture);
            }

            // Generate filename
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Store new picture
            $path = Storage::disk('public')->putFileAs('founders', $file, $filename);
            $data['picture'] = basename($path);
        }

        $founder->update($data);

        return redirect()->route('admin.founder.edit')->with('success', 'Founder section updated successfully.');
    }
}
