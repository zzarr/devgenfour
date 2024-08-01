<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCounter;
use App\Models\DetailProjectCounter;
use App\Models\Visitor;
use App\Models\AboutUsCounter;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class DashboardController extends Controller
{
    public function index()
    {
        $visitorCountAll = Visitor::count();
        $aboutUsCountAll = AboutUsCounter::count();
        $projectCountAll = ProjectCounter::count();
        $detailProjectCountAll = DetailProjectCounter::count();

        // Menghitung jumlah visitor per bulan
        $visitorCounts = Visitor::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc') // Mengurutkan berdasarkan tahun secara ascending
            ->orderBy('month', 'asc') // Mengurutkan berdasarkan bulan secara ascending
            ->get();

        // Menghitung jumlah project counter per bulan
        $projectCounts = ProjectCounter::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc') // Mengurutkan berdasarkan tahun secara ascending
            ->orderBy('month', 'asc') // Mengurutkan berdasarkan bulan secara ascending
            ->get();

        // Menghitung jumlah about us counter per bulan
        $aboutUsCounts = AboutUsCounter::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc') // Mengurutkan berdasarkan tahun secara ascending
            ->orderBy('month', 'asc') // Mengurutkan berdasarkan bulan secara ascending
            ->get();

        // Menghitung jumlah detail project counter per bulan
        $detailProjectCounts = DetailProjectCounter::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc') // Mengurutkan berdasarkan tahun secara ascending
            ->orderBy('month', 'asc') // Mengurutkan berdasarkan bulan secara ascending
            ->get();


        // Inisialisasi array data bulanan
        $visitorData = array_fill(0, 12, 0);
        foreach ($visitorCounts as $visitor) {
            $visitorData[$visitor->month - 1] = $visitor->count;
        }

        $projectData = array_fill(0, 12, 0);
        foreach ($projectCounts as $project) {
            $projectData[$project->month - 1] = $project->count;
        }

        $aboutUsData = array_fill(0, 12, 0);
        foreach ($aboutUsCounts as $aboutUs) {
            $aboutUsData[$aboutUs->month - 1] = $aboutUs->count;
        }

        $detailProjectData = array_fill(0, 12, 0);
        foreach ($detailProjectCounts as $detailProject) {
            $detailProjectData[$detailProject->month - 1] = $detailProject->count;
        }

        return view(
            'Admin.dashboard',
            compact(
                'visitorCountAll',
                'projectCountAll',
                'detailProjectCountAll',
                'aboutUsCountAll',
                'visitorData',
                'projectData',
                'detailProjectData',
                'aboutUsData',


            )
        );
    }
}
