<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use Illuminate\Http\Request;

class AdminPassController extends Controller
{
    public function index()
    {
        $passes = Pass::all();
        return view('admin.passes.index', compact('passes'));
    }

    public function create()
    {
        return view('admin.passes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'duration_days' => 'required|integer',
            'type' => 'required|in:elite,pro,home',
            'features' => 'nullable|array',
        ]);

        Pass::create($validated);
        return redirect()->route('admin.passes.index')->with('success', 'Pass created.');
    }

    public function edit(Pass $pass)
    {
        return view('admin.passes.edit', compact('pass'));
    }

    public function update(Request $request, Pass $pass)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'duration_days' => 'required|integer',
            'type' => 'required|in:elite,pro,home',
            'features' => 'nullable|array',
        ]);

        $pass->update($validated);
        return redirect()->route('admin.passes.index')->with('success', 'Pass updated.');
    }

    public function destroy(Pass $pass)
    {
        $pass->delete();
        return redirect()->route('admin.passes.index')->with('success', 'Pass deleted.');
    }
}
