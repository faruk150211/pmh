<?php

namespace App\Http\Controllers\Admin;

use App\Models\GetInTouch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetInTouchController extends Controller
{
    public function edit()
    {
        $getInTouch = GetInTouch::first() ?? new GetInTouch();
        return view('backend.get-in-touch.edit', compact('getInTouch'));
    }

    public function update(Request $request)
    {
        $getInTouch = GetInTouch::firstOrCreate([]);

        $data = $request->only([
            'badge_en',
            'badge_bn',
            'heading_en',
            'heading_bn',
            'description_en',
            'description_bn',
            'contact_1_title_en',
            'contact_1_title_bn',
            'contact_1_value_en',
            'contact_1_value_bn',
            'contact_1_description_en',
            'contact_1_description_bn',
            'contact_2_title_en',
            'contact_2_title_bn',
            'contact_2_value_en',
            'contact_2_value_bn',
            'contact_2_description_en',
            'contact_2_description_bn',
            'contact_3_title_en',
            'contact_3_title_bn',
            'contact_3_value_en',
            'contact_3_value_bn',
            'contact_3_description_en',
            'contact_3_description_bn',
        ]);

        $getInTouch->update($data);

        return redirect()->route('admin.get-in-touch.edit')->with('success', 'Get In Touch section updated successfully.');
    }
}
