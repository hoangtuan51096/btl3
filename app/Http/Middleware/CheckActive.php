<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActive
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->active == 'new') {
            return redirect()->route('change-password.index');
        }
        return $next($request);
    }
}
