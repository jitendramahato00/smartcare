<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role){

    
    if(Auth::check() && $role == Auth::user()->role)
    {
        return $next($request);
    }
    abort(403, 'Unauthorized action.'); 
}  
}