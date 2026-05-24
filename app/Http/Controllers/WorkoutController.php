<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function create(Program $program)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }
        return view('workouts.create', compact('program'));
    }

    public function store(Request $request, Program $program)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'day_number' => 'required|integer|min:1',
            'description' => 'nullable|string'
        ]);

        $validated['program_id'] = $program->id;
        Workout::create($validated);

        return redirect()->route('programs.show', $program)->with('success', 'Workout added successfully.');
    }

    public function show(Program $program, Workout $workout)
    {
        return view('workouts.show', compact('program', 'workout'));
    }

    public function edit(Program $program, Workout $workout)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }
        return view('workouts.edit', compact('program', 'workout'));
    }

    public function update(Request $request, Program $program, Workout $workout)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'day_number' => 'required|integer|min:1',
            'description' => 'nullable|string'
        ]);

        $workout->update($validated);

        return redirect()->route('programs.show', $program)->with('success', 'Workout updated successfully.');
    }

    public function destroy(Program $program, Workout $workout)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $workout->delete();

        return redirect()->route('programs.show', $program)->with('success', 'Workout deleted successfully.');
    }
}
