<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventSuperAdminCreate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->input('role') === 'super_admin') {
            $user = \App\Models\User::where('role', 'super_admin')->first()->exists();

            if ($user) {
                return abort(403);
            }
        }

        return $next($request);
    }
}
