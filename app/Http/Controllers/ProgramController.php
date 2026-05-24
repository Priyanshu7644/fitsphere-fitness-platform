<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'trainer') {
            $programs = Program::where('trainer_id', auth()->id())->paginate(10);
            return view('programs.index', compact('programs'));
        } elseif (auth()->user()->role === 'admin') {
            $programs = Program::with('trainer')->paginate(10);
            return view('programs.index', compact('programs'));
        } else {
            return redirect()->route('public.programs');
        }
    }

    public function create()
    {
        if (auth()->user()->role !== 'trainer' && auth()->user()->role !== 'admin') {
            abort(403);
        }
        return view('programs.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'trainer' && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_weeks' => 'nullable|integer',
            'difficulty_level' => 'required|in:beginner,intermediate,advanced',
            'category' => 'required|in:fitness,mind_body',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('program_images', 'public');
        }

        $validated['trainer_id'] = auth()->id();
        Program::create($validated);

        return redirect()->route('dashboard')->with('success', 'Program created successfully.');
    }

    public function show(Program $program)
    {
        return view('programs.show', compact('program'));
    }

    public function edit(Program $program)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_weeks' => 'nullable|integer',
            'difficulty_level' => 'required|in:beginner,intermediate,advanced',
            'category' => 'required|in:fitness,mind_body',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($program->image && !str_starts_with($program->image, 'http')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($program->image);
            }
            $validated['image'] = $request->file('image')->store('program_images', 'public');
        }

        $program->update($validated);

        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        if (auth()->id() !== $program->trainer_id && auth()->user()->role !== 'admin') {
            abort(403);
        }
        
        $program->delete();
        return redirect()->back()->with('success', 'Program deleted.');
    }

    public function enroll(Request $request, Program $program)
    {
        // Check if already enrolled
        $exists = Enrollment::where('user_id', auth()->id())->where('program_id', $program->id)->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'You are already enrolled in this program.');
        }

        Enrollment::create([
            'user_id' => auth()->id(),
            'program_id' => $program->id,
            'status' => 'active'
        ]);

        return redirect()->route('dashboard')->with('success', 'Successfully enrolled in ' . $program->title);
    }
}
