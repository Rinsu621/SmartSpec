<?php

namespace App\Http\Controllers;
use App\Models\Spec;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SpecController extends Controller
{
    public function index()
    {
        $brands=Brand::all();
        $specs=Spec::all();
        return view('Spec.view')->with(compact('specs','brands'));
    }

    // public function create()
    // {
    //     $brands=Brand::all();
    //     return view('Spec.create')->with(compact('brands'));
    // }
    public function store(Request $request)
    {
        $brands=Brand::all();
        $image=$request->image->store('images','public');

        Spec::create([
        'name'=>$request->name,
        'image'=>$image,
        'brand_id'=>$request->brand_id,
        'price'=>$request->price,
        'launch'=>$request->launch,
        'color'=>$request->color,
        'processor'=>$request->processor,
        'ram'=>$request->ram,
        'storage'=>$request->storage,
        'display'=>$request->display,
        'camera'=>$request->camera,
        'battery'=>$request->battery,
        'resistance'=>$request->resistance,

        ]);
          return redirect('/spec')->with(compact('brands'));
    }

        public function destroy($id)
        {
            Spec::findOrFail($id)->delete();
            return view('/spec');
        }

        public function edit($id)
        {
            $brands=Brand::all();
            $spec=Spec::findOrFail($id);
            return view('Spec.edit')->with(compact('spec','brands'));
        }

        public function update(Request $request)
        {
            $update=[
                'name'=>$request->name,
                'brand_id'=>$request->brand_id,
                'price'=>$request->price,
                'launch'=>$request->launch,
                'color'=>$request->color,
                'processor'=>$request->processor,
                'ram'=>$request->ram,
                'storage'=>$request->storage,
                'display'=>$request->display,
                'camera'=>$request->camera,
                'battery'=>$request->battery,
                'resistance'=>$request->resistance,
            ];
            if($request->image)
            {
                $image=$request->image->store('images');
                $update['image']=$image;
            }
            Spec::findOrFail($id)->update($update);
      return redirect('/spec');
   }

   public function detail($id)
   {
    $brands=Brand::all();
    $spec=Spec::findOrFail($id);
    return view('Spec.viewmore')->with(compact('spec','brands'));
   }
}
