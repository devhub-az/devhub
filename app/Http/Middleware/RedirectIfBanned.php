<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfBanned
{

    public function handle($request, Closure $next, string $guard = null)
    {
        if (Auth::check() && Auth::user()->isBanned()) {
            Auth::logout();

            return redirect()->home();
        }

        return $next($request);
    }
}
