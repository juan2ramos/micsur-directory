<?php

namespace Directory\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkFinish
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
        $user = Auth::user();
        if($user->role_id == 1){
            return $next($request);
        }
        if($user->client->validate == 1 ){
            return redirect('directorio');
        }
        return $next($request);
    }
}
