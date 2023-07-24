<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompareController extends Controller
{
    public function index()
{
    // Retrieve the list of compared specs from the session
    $comparedSpecs = Session::get('compared_specs', []);

    return view('compare', compact('comparedSpecs'));
}

public function clear()
{
    // Clear the compared specs from the session
    Session::forget('compared_specs');

    // Redirect back to the Compare page
    return redirect()->route('compare');
}
}
