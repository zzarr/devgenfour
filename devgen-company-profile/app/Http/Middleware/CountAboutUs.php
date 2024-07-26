<?php

namespace App\Http\Middleware;

use App\Models\AboutUs;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\AboutUsCounter;

class CountAboutUs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        AboutUsCounter::create([
            'ip_address' => $request->ip(),
            'visited_at' => now(),
        ]);

        return $next($request);
    }
}
