<?php

namespace App\Http\Middleware;

use App\Models\Destination;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRemainingImages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $idDestination = $request->route('destination');

        // Ambil jumlah gambar yang tersisa
        $destination = Destination::with('galleries')->findOrFail($idDestination);
        $remainingImagesCount = $destination->galleries->count();

        // Periksa apakah gambar yang tersisa hanya satu atau kurang
        if ($remainingImagesCount <= 1) {
            return back()->withErrors(['error' => 'Setidaknya sisakan 1 gambar']);
        }
        return $next($request);
    }
}
