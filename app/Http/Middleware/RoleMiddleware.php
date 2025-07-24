<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
       if(Auth::check() && $role == Auth::user()->role) {
            return $next($request);
        }

        // Redirect or abort if the user does not have the required role
        abort(403, 'Unauthorized action.');
}
}
