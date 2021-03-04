<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admincontrol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
        * @return mixed
        */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::check() && Auth::user()->roles->contains(2))
            return redirect()->route("noticia.index");
        else
        return $next($request);
    }
}
