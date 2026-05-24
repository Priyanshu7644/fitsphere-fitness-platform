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
}
