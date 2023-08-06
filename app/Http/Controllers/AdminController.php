<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function admin()
    {
        return view('Admin.login');
    }

    public function attemptLogin(Request $request)
    {

        $admin=Auth::attempt(
            [
                "name"=> $request->name,
                "password"=> $request->password
            ]
            );
            if($request['name']=='appadmin' && $request['password']=='smartadmin@3')
            {
            return redirect()->route('spec.view');
            }

            else{
                return redirect()->route('admin')->withErrors(['Invalid Credentials'])->withInput();
            }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin');
    }
}
