<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(is_null($request->header('token')) === true) {
            abort(403);
        }

        if ($request->header('token') !== env('TOKEN_CHECKER')) {
            abort(403);
        }

        return $next($request);
    }
}
