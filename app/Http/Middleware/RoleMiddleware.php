<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login dulu.');
        }

        if (auth()->user()->role !== $role) {
            return redirect()->route('userDashboard')->with('error', 'Anda tidak punya akses.');
        }

        return $next($request);
    }
}
