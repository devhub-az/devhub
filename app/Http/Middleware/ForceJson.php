<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ForceJson
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        $response = $next($request);
        if (! empty($response->exception) && $response->exception instanceof NotFoundHttpException) {
            return response()->json(['message' => "Not found"], 404);
        }

        return $response;
    }
}
