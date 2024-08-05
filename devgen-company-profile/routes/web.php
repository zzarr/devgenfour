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
use App\Http\Controllers\ProjectCounterController;
use App\Http\Controllers\admin\AboutUsController;
use App\Http\Controllers\AuthController;


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


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

// landing page

Route::get('/home', [LandingPageController::class, 'index'])->middleware('count.visitor');

Route::get('home/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('home/projects/{id}', [ProjectlController::class, 'show'])->middleware('count.project.views')->name('showproject');

Route::get('/home/services', [LandingPageController::class, 'services'])->name('services');
Route::get('/home/contact', [LandingPageController::class, 'contact'])->name('contact');
// route about coba`


// route about coba


// Route::get('/AboutUs', [LandingPageController::class, 'about'])->name('about-us');
Route::get('/AboutUs', [LandingPageController::class, 'about'])->middleware('count.about.us')->name('about-us');
// landing page end

Route::post('/increment-project-counter', [ProjectCounterController::class, 'increment'])->name('increment.project.counter');



/*================================ Admin Routes ======================== */
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard_admin');

    Route::get('admin/project/datatables', [ProjectController::class, 'datatable'])->name('project_admin.datatable');
    Route::get('/admin/project', [ProjectController::class, 'index'])->name('project_admin');
    Route::get('/admin/project_add', [ProjectController::class, 'create'])->name('addproject_admin');
    Route::post('/admin/project_add', [ProjectController::class, 'store'])->name('storeproject_admin');
    Route::get('/admin/project_edit/{id}', [ProjectController::class, 'edit'])->name('editproject_admin');
    Route::post('/admin/project_update/{id}', [ProjectController::class, 'update'])->name('updateproject_admin');
    Route::delete('/admin/project/{id}', [ProjectController::class, 'destroy'])->name('deleteproject_admin');
    Route::post('/deleteprojectimage', [ProjectController::class, 'deleteImage'])->name('deleteprojectimage');

    Route::get('admin/services/datatables', [ServicesController::class, 'datatable'])->name('services_admin.datatable');
    Route::get('/admin/services', [ServicesController::class, 'index'])->name('services_admin');
    Route::get('/admin/services_add', [ServicesController::class, 'create'])->name('addservices_admin');
    Route::post('/admin/services_add', [ServicesController::class, 'store'])->name('storeservices_admin');
    Route::get('/admin/services_edit/{id}', [ServicesController::class, 'edit'])->name('editservices_admin');
    Route::put('/admin/services_update/{id}', [ServicesController::class, 'update'])->name('updateservices_admin');
    Route::delete('/admin/services/{id}', [ServicesController::class, 'destroy'])->name('deleteservices_admin');

    Route::get('admin/choose/datatables', [ChooseController::class, 'datatable'])->name('choose_admin.datatable');
    Route::get('/admin/choose', [ChooseController::class, 'index'])->name('choose_admin');
    Route::get('/admin/choose_add', [ChooseController::class, 'create'])->name('addchoose_admin');
    Route::post('/admin/choose_add', [ChooseController::class, 'store'])->name('storechoose_admin');
    Route::get('/admin/choose_edit/{id}', [ChooseController::class, 'edit'])->name('editchoose_admin');
    Route::put('/admin/choose_update/{id}', [ChooseController::class, 'update'])->name('updatechoose_admin');
    Route::delete('/admin/choose/{id}', [ChooseController::class, 'destroy'])->name('deletechoose_admin');

    // Route::resource('/admin/choose', ChooseController::class);

    Route::get('admin/partner/datatables', [PartnerController::class, 'datatable'])->name('partner_admin.datatable');
    Route::get('/admin/partner', [PartnerController::class, 'index'])->name('partner_admin');
    Route::get('/admin/partner_add', [PartnerController::class, 'create'])->name('addpartner_admin');
    Route::post('/admin/partner_store', [PartnerController::class, 'store'])->name('storepartner_admin');
    Route::get('/admin/partner_edit/{id}', [PartnerController::class, 'edit'])->name('editpartner_admin');
    Route::post('/admin/partner_update/{id}', [PartnerController::class, 'update'])->name('updatepartner_admin');
    Route::delete('/admin/partner/{id}', [PartnerController::class, 'destroy'])->name('deletepartner_admin');

    Route::get('admin/team/datatables', [TeamController::class, 'datatable'])->name('team_admin.datatable');
    Route::get('/admin/team', [TeamController::class, 'index'])->name('team_admin');
    Route::get('/admin/team_add', [TeamController::class, 'create'])->name('addteam_admin');
    Route::post('/admin/team_store', [TeamController::class, 'store'])->name('storeteam_admin');;
    Route::get('/admin/team_edit/{id}', [TeamController::class, 'edit'])->name('editteam_admin');
    Route::post('/admin/team_update/{id}', [TeamController::class, 'update'])->name('updateteam_admin');
    Route::delete('/admin/team/{id}', [TeamController::class, 'destroy'])->name('deleteteam_admin');

    Route::get('/admin/app_setting', [AppSettingController::class, 'index'])->name('app_setting_admin');
    Route::post('/admin/app-settings/{id}', [AppSettingController::class, 'update'])->name('app-settings_update');

    Route::get('/admin/about', [AboutUsController::class, 'index'])->name('about_admin');
    Route::post('/admin/about/{id}', [AboutUsController::class, 'update'])->name('about_update');
});
