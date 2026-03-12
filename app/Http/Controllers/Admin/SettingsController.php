<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Settings::all()->groupBy('category');
        $categories = $settings->keys();

        return view('backend.settings.index', compact('settings', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:settings,key',
            'value' => 'required',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'type' => 'required|in:text,textarea,email,number,boolean,select'
        ]);

        Settings::create($request->all());

        return redirect()->route('admin.settings.index')
                       ->with('success', 'Setting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $setting = Settings::findOrFail($id);
        return view('backend.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Settings::findOrFail($id);
        return view('backend.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $setting = Settings::findOrFail($id);

        $request->validate([
            'value' => 'required',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'type' => 'required|in:text,textarea,email,number,boolean,select'
        ]);

        $setting->update($request->all());

        return redirect()->route('admin.settings.index')
                       ->with('success', 'Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Settings::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.settings.index')
                       ->with('success', 'Setting deleted successfully.');
    }

    /**
     * Update multiple settings at once
     */
    public function updateMultiple(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if ($key !== '_token' && $key !== '_method') {
                Settings::setSetting($key, $value);
            }
        }

        return redirect()->route('admin.settings.index')
                       ->with('success', 'Settings updated successfully.');
    }
}
