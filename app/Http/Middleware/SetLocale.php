<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        } elseif (auth()->check() && auth()->user()->locale) {
            app()->setLocale(auth()->user()->locale);
        } else {
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
