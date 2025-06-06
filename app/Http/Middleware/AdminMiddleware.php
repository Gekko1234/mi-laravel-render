<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->es_admin) {
            abort(403, 'Acceso no autorizado');
        }

        return $next($request);
    }
}
