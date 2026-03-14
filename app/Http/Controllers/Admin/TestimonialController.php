<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('backend.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        return view('backend.testimonials.create');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'nullable|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'content_en' => 'required|string',
            'content_bn' => 'required|string',
            'author_en' => 'required|string|max:100',
            'author_bn' => 'required|string|max:100',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'show_on_home' => 'nullable|boolean',
        ]);

        $validated['show_on_home'] = $request->has('show_on_home');

        // Handle image upload
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('testimonials', $file, $filename);
            $validated['picture'] = 'storage/' . $path;
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully!');
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'title_en' => 'nullable|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'content_en' => 'required|string',
            'content_bn' => 'required|string',
            'author_en' => 'required|string|max:100',
            'author_bn' => 'required|string|max:100',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'show_on_home' => 'nullable|boolean',
        ]);

        $validated['show_on_home'] = $request->has('show_on_home');

        // Handle image upload
        if ($request->hasFile('picture')) {
            // Delete old picture if exists
            if ($testimonial->picture) {
                $oldPath = str_replace('storage/', '', $testimonial->picture);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('picture');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('testimonials', $file, $filename);
            $validated['picture'] = 'storage/' . $path;
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete picture if exists
        if ($testimonial->picture) {
            $path = str_replace('storage/', '', $testimonial->picture);
            Storage::disk('public')->delete($path);
        }

        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully!');
    }
}
