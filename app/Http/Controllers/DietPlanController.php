<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\DietPlan;
use Illuminate\Http\Request;

class DietPlanController extends Controller
{
    public function create(Program $program)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }
        return view('diet_plans.create', compact('program'));
    }

    public function store(Request $request, Program $program)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'meal_schedule' => 'required|string',
            'calories' => 'required|integer',
            'protein' => 'required|numeric',
            'meal_timing' => 'nullable|string',
            'water_intake_recommendations' => 'nullable|string'
        ]);

        $validated['program_id'] = $program->id;
        DietPlan::create($validated);

        return redirect()->route('programs.show', $program)->with('success', 'Diet Plan added successfully.');
    }

    public function show(Program $program, DietPlan $diet_plan)
    {
        return view('diet_plans.show', compact('program', 'diet_plan'));
    }

    public function edit(Program $program, DietPlan $diet_plan)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }
        return view('diet_plans.edit', compact('program', 'diet_plan'));
    }

    public function update(Request $request, Program $program, DietPlan $diet_plan)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'meal_schedule' => 'required|string',
            'calories' => 'required|integer',
            'protein' => 'required|numeric',
            'meal_timing' => 'nullable|string',
            'water_intake_recommendations' => 'nullable|string'
        ]);

        $diet_plan->update($validated);

        return redirect()->route('programs.show', $program)->with('success', 'Diet Plan updated successfully.');
    }

    public function destroy(Program $program, DietPlan $diet_plan)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $diet_plan->delete();

        return redirect()->route('programs.show', $program)->with('success', 'Diet Plan deleted successfully.');
    }
}
