<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::user()?->is_admin) {
            return redirect(route('index'));
        }

        return $next($request);
    }
}
