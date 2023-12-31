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
        // Check if 'user_id' key exists in the session
        if (!(session()->has('user_id'))) {
            return response("You are not allowed to see data", 403); // Return a proper response for unauthorized access
        } else {
            return $next($request); // Allow access to the route by passing the request to the next middleware
        }
    }
}

