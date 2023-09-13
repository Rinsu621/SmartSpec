<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Spec;
use App\Models\User;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function adminSearch(Request $request)
    {
        $searchQuery = $request->input('query');

        // Perform the database query to search for the mobile with the given name
        $result = Spec::where('name', 'like', '%' . $searchQuery . '%')->paginate(10);
        $brands=Brand::all();

        // Pass the search results to the new view
        return view('Search.admin', compact('result','brands'));
    }

    public function userSearch(Request $request)
    {
        $searchQuery = $request->input('data');
        // Perform the database query to search for the mobile with the given name
        $result = Spec::where('name', 'like', '%' . $searchQuery . '%')->get();
        $brands = Brand::all();
        $specs = Spec::all();

        // Pass the search results and search query to the new view
        return view('Search.user', compact('result', 'searchQuery', 'brands', 'specs'));
    }
}
