<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
<<<<<<< HEAD
use App\Http\Controllers\admin\ProjectController;

=======
use App\Http\Controllers\admin\ServicesController;
>>>>>>> 0f8930293f775fe0849573f08ec68a425005dedc

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
Route::get('/admin/project', [ProjectController::class, 'index'])->name('project_admin');


Route::get('/admin/services', [ServicesController::class, 'index'])->name('services_admin');
