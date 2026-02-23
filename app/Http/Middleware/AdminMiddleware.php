<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // If the user is logged in AND is an admin, let them through
    if (Auth::check() && Auth::user()->is_admin) {
        return $next($request);
    }

    // Otherwise, redirect them to the user dashboard with an error
    return redirect()->route('dashboard')->with('error', 'You do not have admin access.');
}
}
