<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestCustomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('user')) {
            return back();
        }
        return $next($request);
    }
}
