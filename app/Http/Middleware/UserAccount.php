<?php

namespace App\Http\Middleware;

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
        $user = $request->id;
        dd($user);
        if (Auth::user()->id != $user) {
            return redirect()->action('/');
        }
        return $next($request);
    }
}
