<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TaskGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_id')) {
            return "Log in first"; // Redirect if 'user_id' doesn't exist in the session
        }
        else {
            return $next($request);
        }
    }
}
