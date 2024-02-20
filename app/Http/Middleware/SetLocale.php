<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            $locale = Session::get('locale', config('app.locale'));
        } else {
            $locale = in_array($request->getLocale(), config('ln-prints.locales'))
                ? $request->getLocale()
                : config('app.locale');
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
