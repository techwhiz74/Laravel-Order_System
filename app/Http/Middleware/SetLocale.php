<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->route('locale');

        if (!in_array($locale, ['de', 'en'])) {
            $locale = 'de'; // Default to German if the provided locale is not supported.
        }
        App::setLocale($locale);
        return $next($request);
    }




    // public function handle($request, Closure $next)
    // {
    //     $locale = $request->segment(1); // Get the first segment of the URL
    //     if (in_array($locale, ['en', 'de'])) {
    //         app()->setLocale($locale);
    //     } else {
    //         app()->setLocale(config('app.locale'));
    //     }

    //     return $next($request);
    // }
}
