<?php

namespace App\Http\Middleware;

use App;
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
        $raw_locale = cache('lang');
        if (in_array($raw_locale, config('app.locales'))) {
            $locale = $raw_locale;
        } else {
            $locale = config('app.locale');
        }
        App::setLocale($locale);

        return $next($request);
    }
}
