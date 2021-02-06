<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Policies\AuthorPolicy;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class VerifyAdmins
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->user()->can(AuthorPolicy::ADMIN, User::class)) {
            return $next($request);
        }

        throw new HttpException(403, 'Forbidden');
    }
}
