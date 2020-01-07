<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class SessionLoginUser
{
    public function handle($request, Closure $next)
    {
        if (empty(session('session_id'))) {
            return redirect('login');
        }


        return $next($request);
    }
}
