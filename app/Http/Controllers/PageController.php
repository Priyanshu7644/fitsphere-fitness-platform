<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\User;

class PageController extends Controller
{
    public function home()
    {
        $featuredPrograms = Program::with('trainer')->take(3)->get();
        $trainers = User::where('role', 'trainer')->take(3)->get();
        return view('public.home', compact('featuredPrograms', 'trainers'));
    }

    public function about()
    {
        $trainers = User::where('role', 'trainer')->get();
        return view('public.about', compact('trainers'));
    }

    public function programs()
    {
        $programs = Program::with('trainer')->paginate(9);
        return view('public.programs', compact('programs'));
    }

    public function trainers()
    {
        $trainers = User::where('role', 'trainer')->with('trainerProfile')->paginate(9);
        return view('public.trainers', compact('trainers'));
    }

    public function contact()
    {
        return view('public.contact');
    }
}
