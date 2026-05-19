<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function users()
    {
        // Only allow admins
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        
        $users = User::paginate(15);
        return view('admin.users', compact('users'));
    }

    public function deleteUser(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Cannot delete yourself.');
        }

        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }
}
