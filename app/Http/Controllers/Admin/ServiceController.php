<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('backend.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'short_description_en' => 'nullable|string|max:500',
            'short_description_bn' => 'nullable|string|max:500',
            'description_en' => 'nullable|string',
            'description_bn' => 'nullable|string',
            'slug_en' => 'nullable|string|max:255',
            'slug_bn' => 'nullable|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'show_on_home' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('services', 'public');
        }

        $validated['show_on_home'] = $request->has('show_on_home') ? 1 : 0;

        Service::create($validated);
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backend.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backend.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'short_description_en' => 'nullable|string|max:500',
            'short_description_bn' => 'nullable|string|max:500',
            'description_en' => 'nullable|string',
            'description_bn' => 'nullable|string',
            'slug_en' => 'nullable|string|max:255',
            'slug_bn' => 'nullable|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'show_on_home' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('banner')) {
            // Delete old banner if it exists
            if ($service->banner && Storage::disk('public')->exists($service->banner)) {
                Storage::disk('public')->delete($service->banner);
            }
            $validated['banner'] = $request->file('banner')->store('services', 'public');
        }

        $validated['show_on_home'] = $request->has('show_on_home') ? 1 : 0;

        $service->update($validated);
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        // Delete banner image from storage if it exists
        if ($service->banner && Storage::disk('public')->exists($service->banner)) {
            Storage::disk('public')->delete($service->banner);
        }

        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }
}
