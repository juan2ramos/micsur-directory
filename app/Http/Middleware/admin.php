<?php

namespace Directory\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
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
        if($user->role_id != 1){;
            if($user->client->validate == 0){
                return redirect('finalizar-pago');
            }
            return redirect('directorio');
        }
        return $next($request);
    }
}
