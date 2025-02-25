<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ops\Generalrequests\GeneralRequestsController;
use App\Http\Controllers\ops\Generalrequests\AdminGeneralRequestsController;

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

// Route::get('/', function () {
//     return view('pages.first-page.app');
// });

//auth
Route::get('/login', [AuthController::class, 'LoginPage'])->name('LoginPage');
Route::post('/login-account', [AuthController::class, 'Login'])->name('Login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [PagesController::class, 'Index'])->name('Index');
Route::get('/secondary/page', [PagesController::class, 'SeconDaryPage'])->name('SeconDaryPage');

//คำร้องทั่วไป
Route::get('/general-requests', [GeneralRequestsController::class, 'UsersFormPage'])->name('UsersFormPage');
Route::post('/general-requests/form/create', [GeneralRequestsController::class, 'FormCreate'])->name('FormCreate');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'AdminIndex'])->name('AdminIndex');

    Route::get('/admin/general-requests/showdata', [AdminGeneralRequestsController::class, 'GeneralRequestsAdminShowData'])->name('GeneralRequestsAdminShowData');
    Route::get('/admin/general-requests/export-pdf/{id}', [AdminGeneralRequestsController::class, 'GeneralRequestsAdminExportPDF'])->name('GeneralRequestsAdminExportPDF');
    Route::post('/admin/general-requests/admin-reply/{id}', [AdminGeneralRequestsController::class, 'GeneralRequestsAdminReply'])->name('GeneralRequestsAdminReply');
    Route::post('/admin/general-requests/update-status/{id}', [AdminGeneralRequestsController::class, 'GeneralRequestsUpdateStatus'])->name('GeneralRequestsUpdateStatus');





});
