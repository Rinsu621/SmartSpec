<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Spec;
use App\Models\User;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function adminSearch()
    {
        $search_text=$GET['search'];
        $specs=Spec::where('title','LIKE','%'.$search_text.'%')->get();
        $brands=Brand::where('title','LIKE','%'.$search_text.'%')->get();

        return view('Search.admin',compact('specs','brands'));
    }
    public function userSearch(Request $request)
    {
       $query=$request->input('query');
       $results=Spec::where('name','LIKE',"%$query%")->get();
       return view('Search.user',['results'=>$results]);
    }


}
