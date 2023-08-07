<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Spec;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginPage()
    {
        return view('User.login');
    }
    public function attemptLogin(Request $request)
    {
        $user=Auth::attempt(
            [
                "name"=> $request->name,
                "password"=> $request->password
            ]
            );
            if($user)
            {
                return redirect()->route('index.page');
            }
            else if($request['name']=='admin' && $request['password']=='smartadmin146')
            {
            return redirect()->route('spec.view');
            }

            else{
                return redirect()->route('loginPage')->withErrors(['Invalid Credentials'])->withInput();
            }
    }
    public function login(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'password'=> 'required'
        ]);
    }


    public function create()
    {
        return view('User.Register');
    }


    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'name'=> 'required',
            'email'=> 'required|unique:users|email',
            'password'=>'required'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password)
            ]);
            return redirect()->route('loginPage')->withSuccess("Registration Complete. Please Login");
        }
        catch(Exception $e)
        {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function home()
    {
        $specs=Spec::all();
        $brands=Brand::all();
        return view('User.view')->with(compact('specs','brands'));
    }

    public function showBrandCards($brand)
{
    $specs=Spec::all();
    $uniqueBrands = $specs->pluck('brand.name')->unique();

    // Filter specs based on the selected brand
    $selectedBrand = $brand;
    $brandCards = $specs->where('brand.name', $selectedBrand);

    return view('User.drop', compact('uniqueBrands', 'brandCards', 'selectedBrand','specs'));

}
}
