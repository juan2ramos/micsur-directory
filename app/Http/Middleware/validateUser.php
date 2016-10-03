<?php

namespace Directory\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class validateUser
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
        if($user->client->validate == 0){
            return redirect('finalizar-pago');
        }
        return $next($request);


    }
}
