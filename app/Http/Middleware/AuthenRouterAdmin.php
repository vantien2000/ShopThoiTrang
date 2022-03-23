<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenRouterAdmin
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
        $current = $request->route()->getName();
        if (Auth::guard($guard)->check()) {
            if ($current == 'admin.login') {
                return Redirect()->route('admin.home');
            }
            return $next($request);
        }
        if ($current == 'admin.home') {
            return Redirect()->route('admin.login');
        }
        return $next($request);
    }
}
