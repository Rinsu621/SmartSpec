<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Spec;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchQuery = $request->input('search');

        // Perform the search for both Brand and Spec models
        $brands = Brand::where('name', 'LIKE', '%' . $searchQuery . '%')->get();
        $specs = Spec::where('name', 'LIKE', '%' . $searchQuery . '%')->get();

        return view('search-results')->with(compact('brands', 'specs'));
    }
}
