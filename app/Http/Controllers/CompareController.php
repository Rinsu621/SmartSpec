<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Spec;
use App\Models\Brand;

class CompareController extends Controller
{
   public function index()
   {

    $specs=Spec::all();
    $brands=Brand::all();
    return view('User.compare')->with(compact('specs','brands'));
   }
}
