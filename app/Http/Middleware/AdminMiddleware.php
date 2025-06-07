<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'manager'])) {
            return redirect()->route('login')
                ->with('error', 'Unauthorized access. Please log in with admin credentials.');
        }

        return $next($request);
    }
}
