<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::all();
        return view('centers.index', compact('centers'));
    }
}
