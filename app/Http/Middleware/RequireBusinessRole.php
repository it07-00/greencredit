<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireBusinessRole
{
    protected array $allowedRoles = ['store_owner', 'store_staff', 'partner'];

    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || ! in_array($user->role, $this->allowedRoles)) {
            abort(403, 'Bạn không có quyền truy cập Business Portal.');
        }

        return $next($request);
    }
}
