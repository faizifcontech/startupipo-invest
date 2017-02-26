<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AgentSahaja
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin === 2) {
            if (Auth::user()->signature === null) {
                return   redirect()->action('AgentController@siggyAgent');
            } else {
                return $next($request);
            }
        }
        return abort(403);
    }
}
