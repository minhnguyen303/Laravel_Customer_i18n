<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Locale
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('website_language')) {
            Session::put('website_language', config('app.locale'));
        }
        App::setLocale(Session::get('website_language'));
        return $next($request);
    }
}
