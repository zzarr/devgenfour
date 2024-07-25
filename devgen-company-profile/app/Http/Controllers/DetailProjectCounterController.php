<?php
namespace App\Http\Controllers;

use App\Models\DetailProjectCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DetailProjectCounterController extends Controller
{
    public function incrementCounter($id)
    {
        // Check if the project has already been viewed in this session
        if (!Session::has('project_viewed_' . $id)) {
            // Find or create the counter for the specific project
            $counter = DetailProjectCounter::where('project_id', $id)->first();

            if (!$counter) {
                // Create a new counter if not exists
                $counter = DetailProjectCounter::create([
                    'project_id' => $id,
                    'count' => 1,
                ]);
            } else {
                // Increment the count if the counter exists
                $counter->increment('count');
            }

            // Mark the project as viewed in this session
            Session::put('project_viewed_' . $id, true);
        } else {
            // If the project was already viewed in this session, retrieve the counter
            $counter = DetailProjectCounter::where('project_id', $id)->first();
            if (!$counter) {
                $counter = DetailProjectCounter::create([
                    'project_id' => $id,
                    'count' => 0,
                ]);
            }
        }

        return response()->json(['success' => true, 'count' => $counter->count ?? 0]);
    }
}


