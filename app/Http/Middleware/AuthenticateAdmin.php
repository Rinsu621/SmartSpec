<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAdmin
{
    public function handle($request, Closure $next)
    {
        if ($request->input('name') === 'appadmin' && $request->input('password') === 'smartadmin@3') {
            return $next($request);
        }

        return redirect()->route('admin')->withErrors(['Invalid Credentials'])->withInput();
    }
}
