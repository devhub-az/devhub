<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     * @throws Exception
     */
    public function handle($request, Closure $next): mixed
    {
        if ($request->header('Accept-Language')) {
            \App::setLocale($request->header('Accept-Language'));
        }

        return $next($request);
    }
}
