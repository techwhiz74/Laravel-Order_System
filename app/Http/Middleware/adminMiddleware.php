<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class adminMiddleware
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

        if (!Auth::check()) {
            return redirect(__('routes.admin-login'))->with('danger', 'Sorry You are not authorized to access this page');
        } else {
            return $next($request);
        }

        // if (Auth::check() && $request->routeIs('admin-login')) {
        //     dd(Auth::check());
        //     return redirect(__('routes.admin-vieworders')); // Redirect to another route after login
        // }
        // return back()->with('danger', 'You are not authorized to access this page');
    }
}
