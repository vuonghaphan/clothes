<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginWeb
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
        if(!get_data_user('web')){
            return view('client.auth.login');
        }
        return $next($request);
    }
}
