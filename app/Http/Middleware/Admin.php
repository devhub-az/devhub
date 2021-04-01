<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * @param         $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        $user = $request->user();

        return $user && $user->isAn('admin') ? $next($request) : abort(404);
    }
}
