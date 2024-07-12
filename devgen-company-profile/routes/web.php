<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\ChooseController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\LandingpageController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// landing page

Route::get('/home', [LandingPageController::class, 'index']);

// landing page end


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard_admin');
//Route::get('/admin/project', [ProjectController::class, 'index'])->name('project_admin');


Route::get('/admin/services', [ServicesController::class, 'index'])->name('services_admin');
Route::get('/admin/choose', [ChooseController::class, 'index'])->name('choose_admin');
Route::get('/admin/project', [ProjectController::class, 'index'])->name('project_admin');
Route::get('/admin/partner', [PartnerController::class, 'index'])->name('partner_admin');
Route::get('/admin/team', [TeamController::class, 'index'])->name('team_admin');

