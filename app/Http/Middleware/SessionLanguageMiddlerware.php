<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionLanguageMiddlerware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session('lang'))
        {
            session()->put('lang', 'tr');
        }
        app()->setLocale(session('lang'));
        return $next($request);
    }
}
