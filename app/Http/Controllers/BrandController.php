<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Spec;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::paginate(10);
        return view('Brand.view')->with(compact('brands'));
    }

    public function create()
    {
        return view('Brand.create');
    }

    public function store(Request $request)
    {
        Brand::create(
            [
                'name' => $request->name
            ]
            );
            return redirect('/brand');
    }
    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();
        return redirect('/brand');
    }

    // public function edit($id)
    // {
    //     $brand=Brand::findOrFail($id);
    //     return view('Brand.edit')->with(compact('brand'));
    // }

    public function update(Request $request, $id)
    {
        Brand::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        return redirect('/brand');
    }


}
