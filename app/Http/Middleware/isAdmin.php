<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek jika user terautentikasi dan memiliki role 'admin'
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'You are not authorized.');
        }

        return $next($request);
    }
}
