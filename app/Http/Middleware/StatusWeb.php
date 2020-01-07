<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;

class StatusWeb 
{
    public function handle($request, Closure $next)
    {	
        if(Controller::StatusWeb()==false){return redirect('page-offline');}
        return $next($request);
    }
}
