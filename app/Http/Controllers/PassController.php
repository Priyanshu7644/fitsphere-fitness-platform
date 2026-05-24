<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use Illuminate\Http\Request;

class PassController extends Controller
{
    public function index()
    {
        $passes = Pass::all();
        return view('passes.index', compact('passes'));
    }

    public function show(Pass $pass)
    {
        // Define a roadmap based on the pass type
        $roadmaps = [
            'home' => [
                ['title' => 'Week 1: Fundamentals', 'desc' => 'Assessment, mobility drills, and introductory bodyweight workouts.'],
                ['title' => 'Week 2-4: Core Building', 'desc' => 'Introduction to VOD strength classes and beginner yoga.'],
                ['title' => 'Month 2: Progressive Overload', 'desc' => 'Increasing intensity in home workouts and joining daily live sessions.'],
                ['title' => 'Month 3: Peak Performance', 'desc' => 'Advanced home routines, advanced diet plans, and lifestyle integration.']
            ],
            'pro' => [
                ['title' => 'Week 1: Center Induction', 'desc' => 'First physical center visit, body composition analysis, and equipment orientation.'],
                ['title' => 'Week 2-4: Hybrid Training', 'desc' => 'Combining 3 physical center visits with the 12-Week Muscle Builder program at home.'],
                ['title' => 'Month 2: Strength & Conditioning', 'desc' => 'Focus on advanced compound lifts at the center and recovery yoga at home.'],
                ['title' => 'Month 3: Advanced Split', 'desc' => 'Optimizing the hybrid schedule with advanced diet plans for maximum hypertrophy.']
            ],
            'elite' => [
                ['title' => 'Week 1: Personal Coach Match', 'desc' => '1-on-1 consultation with your assigned coach and custom plan creation.'],
                ['title' => 'Week 2-4: Elite Immersion', 'desc' => 'Unlimited center access, guided personal training sessions, and exclusive masterclasses.'],
                ['title' => 'Month 2: Specialized Protocols', 'desc' => 'Targeted microcycles, direct coach feedback, and dynamic diet adjustments.'],
                ['title' => 'Month 3: Mastery', 'desc' => 'Sustaining peak fitness, complex movement mastery, and long-term goal setting.']
            ]
        ];
        
        $roadmap = $roadmaps[$pass->type] ?? $roadmaps['home'];
        
        return view('passes.show', compact('pass', 'roadmap'));
    }

    public function mockBuy(Request $request)
    {
        session(['has_pass' => true]);
        return redirect()->back()->with('success', 'Payment successful! Pass activated.');
    }
}
