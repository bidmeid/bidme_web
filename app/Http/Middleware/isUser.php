<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //$token = $_COOKIE['access_tokenku'];
        //dd($token);
        //dd($_COOKIE['access_tokenku']);
        //return $next($request, $token);
        if (isset($_COOKIE['access_tokenku'])) {
            //echo ($_COOKIE['access_tokenku']);
			 
            return $next($request, $_COOKIE['access_tokenku']);
        } else {
            // dd($_COOKIE['access_tokenku']);
            //$request->cookie('access_tokenku', null);
            return abort(404);
        }
    }
}
