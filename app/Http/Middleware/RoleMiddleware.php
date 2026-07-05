<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user || $user->status !== 'active') {
            abort(403, 'Ban khong co quyen truy cap.');
        }

        if ($user->role === 'super_admin' || in_array($user->role, $roles, true)) {
            return $next($request);
        }

        abort(403, 'Ban khong co quyen truy cap.');
    }
}
