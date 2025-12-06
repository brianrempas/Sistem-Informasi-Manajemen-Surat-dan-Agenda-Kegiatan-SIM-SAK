<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrStaffMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            abort(403, 'Unauthorized');
        }

        $role = Auth::user()->role;
        if ($role === 'admin' || $role === 'staff') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
