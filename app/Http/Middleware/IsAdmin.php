<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
{
    if (!Auth::check()) {
        return $next($request);
    }

    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    return $next($request);
}

}
