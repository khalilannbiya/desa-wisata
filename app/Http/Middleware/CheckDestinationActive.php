<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Destination;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDestinationActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->route('slug');
        $is_inactive = Destination::where('slug', $slug)->where('status', 'inactive')->exists();

        if ($is_inactive) {
            return abort(403);
        }

        return $next($request);
    }
}
