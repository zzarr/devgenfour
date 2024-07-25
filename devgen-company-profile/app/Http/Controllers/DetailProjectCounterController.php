<?php
namespace App\Http\Controllers;

use App\Models\DetailProjectCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DetailProjectCounterController extends Controller
{
    public function incrementCounter(Request $request, $id)
    {
        // Gunakan session untuk memastikan counter hanya ditambahkan sekali per sesi
        if (!Session::has('project_viewed_' . $id)) {
            // Temukan atau buat record baru untuk project ID yang spesifik
            $counter = DetailProjectCounter::firstOrCreate(['project_id' => $id], ['count' => 0]);

            // Increment count
            $counter->increment('count');

            // Tandai bahwa proyek telah dilihat di sesi ini
            Session::put('project_viewed_' . $id, true);
        }

        return response()->json(['success' => true, 'count' => $counter->count]);
    }
}


