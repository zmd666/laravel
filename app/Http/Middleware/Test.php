<?php

namespace App\Http\Middleware;

use Closure;

class Test
{
    public function handle($request, Closure $next)
    {
        $request->id = 1;
        return $next($request);
    }
}