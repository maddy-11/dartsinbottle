<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class AdminLogin
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
            
        if(!Auth::check()){

            return redirect('admin/login');
        }     


        return $next($request);
    }
}
