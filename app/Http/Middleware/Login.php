<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        $res=session('red');
        if (!$res) {
           return redirect('login')->with('msg','请先登录'); 
        }
        return $next($request);
    }
}
