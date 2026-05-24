<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;

class AdminCenterController extends Controller
{
    public function index()
    {
        $centers = Center::all();
        return view('admin.centers.index', compact('centers'));
    }

    public function create()
    {
        return view('admin.centers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'address' => 'required|string',
            'image' => 'nullable|string',
            'features' => 'nullable|array',
        ]);

        Center::create($validated);
        return redirect()->route('admin.centers.index')->with('success', 'Center created.');
    }

    public function edit(Center $center)
    {
        return view('admin.centers.edit', compact('center'));
    }

    public function update(Request $request, Center $center)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'address' => 'required|string',
            'image' => 'nullable|string',
            'features' => 'nullable|array',
        ]);

        $center->update($validated);
        return redirect()->route('admin.centers.index')->with('success', 'Center updated.');
    }

    public function destroy(Center $center)
    {
        $center->delete();
        return redirect()->route('admin.centers.index')->with('success', 'Center deleted.');
    }
}
