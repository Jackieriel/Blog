<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        // check if auth user has the permission
        if(!Auth::user()->admin)
        {
            Session::flash('info', 'You do not have permission to perform this action ');

            return redirect()->back();
        }
        
        return $next($request);
    }
}
