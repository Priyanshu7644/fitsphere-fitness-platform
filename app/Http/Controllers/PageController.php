<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\User;
use App\Models\LiveSession;
use App\Models\Pass;

class PageController extends Controller
{
    public function home()
    {
        $featuredPrograms = Program::with('trainer')->take(3)->get();
        $trainers = User::where('role', 'trainer')->take(3)->get();
        $passes = Pass::take(3)->get();
        return view('public.home', compact('featuredPrograms', 'trainers', 'passes'));
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

    public function programDetails(Program $program)
    {
        $program->load('trainer');
        return view('public.program_details', compact('program'));
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

    public function liveSessions()
    {
        $liveSessions = LiveSession::with('trainer')->where('session_date', '>=', now())->orderBy('session_date', 'asc')->paginate(9);
        return view('public.live_sessions', compact('liveSessions'));
    }

    public function liveSessionDetails(LiveSession $liveSession)
    {
        $liveSession->load('trainer');
        return view('public.live_session_details', compact('liveSession'));
    }
}
