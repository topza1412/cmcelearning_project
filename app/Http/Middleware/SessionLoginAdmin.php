<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class SessionLoginAdmin
{
    public function handle($request, Closure $next)
    {
        if (empty(session('session_admin_id'))) {
            return redirect('admin/login');
        }


        return $next($request);
    }
}
