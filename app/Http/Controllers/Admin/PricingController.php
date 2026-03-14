<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pricing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function edit()
    {
        $pricing = Pricing::firstOrCreate([]);
        return view('backend.pricing.edit', compact('pricing'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'nullable|max:255',
            'title_bn' => 'nullable|max:255',
            'description_en' => 'nullable',
            'description_bn' => 'nullable',
            'price' => 'nullable|numeric|min:0',
            'price_label_en' => 'nullable|max:255',
            'price_label_bn' => 'nullable|max:255',
            'price_subtitle_en' => 'nullable|max:255',
            'price_subtitle_bn' => 'nullable|max:255',
            'currency' => 'nullable|max:10',
            'feature_1_en' => 'nullable|max:255',
            'feature_1_bn' => 'nullable|max:255',
            'feature_2_en' => 'nullable|max:255',
            'feature_2_bn' => 'nullable|max:255',
            'feature_3_en' => 'nullable|max:255',
            'feature_3_bn' => 'nullable|max:255',
            'feature_4_en' => 'nullable|max:255',
            'feature_4_bn' => 'nullable|max:255',
            'feature_5_en' => 'nullable|max:255',
            'feature_5_bn' => 'nullable|max:255',
            'features_title_en' => 'nullable|max:255',
            'features_title_bn' => 'nullable|max:255',
            'note_en' => 'nullable',
            'note_bn' => 'nullable',
        ]);

        $pricing = Pricing::first();
        $pricing->update($validated);

        return redirect()->back()->with('success', 'Pricing information updated successfully!');
    }
}
