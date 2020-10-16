<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->role()->name == config('common.role.admin')) {
                return route('admin');
            } elseif (Auth::user()->role()->name == config('common.role.user')) {
                return route('user');
            } else {
                return route('home');
            }
        }

        return $next($request);
    }
}
