<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {

        $role = auth()->user()->role;

        $allowedRoles = explode(',', $roles);

        if (!in_array($role, $allowedRoles)) {
            abort(403, 'Akses ditolak. Kamu tidak punya hak akses.');
        }

        return $next($request);
    }

}
