<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserAccount
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

        	if (Auth::check() && Auth::user()->role != 'Admin') {
        		$user = $request->segment(2);
        		if (Auth::user()->id != $user) {
        			return redirect()->action('HomeController@index');
        		}
        }
        return $next($request);
    }
}
