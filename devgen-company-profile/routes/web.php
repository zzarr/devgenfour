<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\ChooseController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\AppSettingController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ProjectlController;

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
Route::get('/project/{id}', [ProjectlController::class, 'show'])->name('showproject');
// landing page end

/*================================ Admin Routes ======================== */

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard_admin');

Route::get('admin/project/datatables', [ProjectController::class, 'datatable'])->name('project_admin.datatable');
Route::get('/admin/project', [ProjectController::class, 'index'])->name('project_admin');
Route::get('/admin/project_add', [ProjectController::class, 'create'])->name('addproject_admin');
Route::post('/admin/project_add', [ProjectController::class, 'store'])->name('storeproject_admin');
Route::get('/admin/project_edit', [ProjectController::class, 'edit'])->name('editproject_admin');
Route::get('/admin/project_delete', [ProjectController::class, 'destroy'])->name('deleteproject_admin');

Route::get('admin/services/datatables', [ServicesController::class, 'datatable'])->name('services_admin.datatable');
Route::get('/admin/services', [ServicesController::class, 'index'])->name('services_admin');
Route::get('/admin/services_add', [ServicesController::class, 'create'])->name('addservices_admin');
Route::post('/admin/services_add', [ServicesController::class, 'store'])->name('storeservices_admin');
Route::get('/admin/services_delete', [ServicesController::class, 'destroy'])->name('deleteservices_admin');
Route::get('/admin/services_edit', [ServicesController::class, 'edit'])->name('editservices_admin');

// Route::prefix('admin')->name('admin.')->group(function() {
//     Route::get('/choose', [ChooseController::class, 'index'])->name('choose_admin');
//     Route::get('/choose/datatable', [ChooseController::class, 'datatable'])->name('choose_admin.datatable');
//     Route::get('/choose_add', [ChooseController::class, 'create'])->name('addchoose_admin');
//     Route::post('/choose_add', [ChooseController::class, 'store'])->name('storechoose_admin');
//     Route::get('/choose_edit/{choose}', [ChooseController::class, 'edit'])->name('editchoose_admin');
//     Route::put('/choose_edit/{choose}', [ChooseController::class, 'update'])->name('updatechoose_admin');
//     Route::delete('/choose_delete/{choose}', [ChooseController::class, 'destroy'])->name('deletechoose_admin');
// });

Route::get('admin/choose/datatables', [ChooseController::class, 'datatable'])->name('choose_admin.datatable');
Route::resource('/admin/choose', ChooseController::class);

Route::get('admin/partner/datatables', [PartnerController::class, 'datatable'])->name('partner_admin.datatable');
Route::get('/admin/partner', [PartnerController::class, 'index'])->name('partner_admin');
Route::get('/admin/partner_add', [PartnerController::class, 'create'])->name('addpartner_admin');
Route::get('/admin/partner_edit', [PartnerController::class, 'edit'])->name('editpartner_admin');

Route::get('admin/team/datatables', [TeamController::class, 'datatable'])->name('team_admin.datatable');
Route::get('/admin/team', [TeamController::class, 'index'])->name('team_admin');
Route::get('/admin/team_add', [TeamController::class, 'create'])->name('addteam_admin');
Route::get('/admin/team_edit', [TeamController::class, 'edit'])->name('editteam_admin');


Route::get('/admin/app_setting', [AppSettingController::class, 'index'])->name('app_setting_admin');
