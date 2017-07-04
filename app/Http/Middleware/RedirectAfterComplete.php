<?php

namespace App\Http\Middleware;

use Closure;

class RedirectAfterComplete
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
        if(request()->user()->hasCompletedProfile()){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
