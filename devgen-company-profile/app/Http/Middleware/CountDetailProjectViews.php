<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\DetailProjectCounter;

class CountDetailProjectViews
{
    public function handle(Request $request, Closure $next)
    {
        // Assuming you want to track the project views by IP
        $projectId = $request->route('id'); // Get the project ID from the route

            // Create a new record if none exists
            DetailProjectCounter::create([
                'project_id' => $projectId,
                'ip_address' => $request->ip(),
                'visited_at' => now(),
            ]);
        
        return $next($request);
    }
}
