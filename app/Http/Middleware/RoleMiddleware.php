<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. If user is NOT logged in, send to login page
        if (! $request->user()) {
            return redirect('/login');
        }

        // 2. If user's role does NOT match the required role, stop them!
        if ($request->user()->role !== $role) {
            abort(403, 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
