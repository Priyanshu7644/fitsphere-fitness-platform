<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Enrollment;
use App\Models\LiveSession;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->role === 'admin') {
            $totalUsers = User::count();
            $totalTrainers = User::where('role', 'trainer')->count();
            $totalPrograms = Program::count();
            return view('dashboard.admin', compact('totalUsers', 'totalTrainers', 'totalPrograms'));
        } 
        elseif ($user->role === 'trainer') {
            $programs = Program::where('trainer_id', $user->id)->withCount('enrollments')->get();
            $sessions = LiveSession::where('trainer_id', $user->id)->get();
            return view('dashboard.trainer', compact('programs', 'sessions'));
        } 
        else {
            $enrollments = Enrollment::where('user_id', $user->id)->with('program.trainer')->get();
            $upcomingSessions = LiveSession::where('session_date', '>=', now())->orderBy('session_date')->take(5)->get();
            return view('dashboard.user', compact('enrollments', 'upcomingSessions'));
        }
    }
}
