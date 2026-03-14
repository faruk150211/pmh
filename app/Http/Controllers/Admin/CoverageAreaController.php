<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoverageArea;
use Illuminate\Http\Request;

class CoverageAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coverageAreas = CoverageArea::orderBy('order', 'asc')->paginate(10);
        return view('backend.coverage-areas.index', compact('coverageAreas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coverage-areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_bn' => 'nullable|string',
            'show_on_home' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['show_on_home'] = $request->has('show_on_home') ? 1 : 0;

        CoverageArea::create($validated);
        return redirect()->route('admin.coverage-areas.index')->with('success', 'Coverage Area created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coverageArea = CoverageArea::findOrFail($id);
        return view('backend.coverage-areas.show', compact('coverageArea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coverageArea = CoverageArea::findOrFail($id);
        return view('backend.coverage-areas.edit', compact('coverageArea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coverageArea = CoverageArea::findOrFail($id);

        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_bn' => 'nullable|string',
            'show_on_home' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['show_on_home'] = $request->has('show_on_home') ? 1 : 0;

        $coverageArea->update($validated);
        return redirect()->route('admin.coverage-areas.index')->with('success', 'Coverage Area updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coverageArea = CoverageArea::findOrFail($id);
        $coverageArea->delete();
        return redirect()->route('admin.coverage-areas.index')->with('success', 'Coverage Area deleted successfully!');
    }
}
