<?php

namespace Directory\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Lang
{

    public function handle($request, Closure $next)
    {
        if (!empty(session('lang'))) {
            \App::setLocale(session('lang'));
        }
        return $next($request);
    }
}
