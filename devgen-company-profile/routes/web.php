<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\ChooseController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\admin\TeamController;


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

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard_admin');
Route::get('/admin/services', [ServicesController::class, 'index'])->name('services_admin');
Route::get('/admin/choose', [ChooseController::class, 'index'])->name('choose_admin');
Route::get('/admin/choose_add', [ChooseController::class, 'create'])->name('addchoose_admin');
Route::get('/admin/choose_edit', [ChooseController::class, 'edit'])->name('editchoose_admin');
Route::get('/admin/project', [ProjectController::class, 'index'])->name('project_admin');
Route::get('/admin/project_add', [ProjectController::class, 'create'])->name('addproject_admin');
Route::get('/admin/project_edit', [ProjectController::class, 'edit'])->name('editproject_admin');

Route::get('/admin/partner', [PartnerController::class, 'index'])->name('partner_admin');
Route::get('/admin/partner_add', [PartnerController::class, 'create'])->name('addpartner_admin');
Route::get('/admin/partner_edit', [PartnerController::class, 'edit'])->name('editpartner_admin');

Route::get('/admin/team', [TeamController::class, 'index'])->name('team_admin');
Route::get('/admin/team_add', [TeamController::class, 'create'])->name('addteam_admin');
Route::get('/admin/team_edit', [TeamController::class, 'edit'])->name('editteam_admin');


