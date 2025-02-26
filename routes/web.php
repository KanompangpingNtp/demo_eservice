<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ops\Generalrequests\GeneralRequestsController;
use App\Http\Controllers\ops\Generalrequests\AdminGeneralRequestsController;
use App\Http\Controllers\TMO\general_electricity_request\GeneralElectricityRequestController;
use App\Http\Controllers\TMO\general_electricity_request\AdminGeneralElectricityRequestController;
use App\Http\Controllers\TMO\general_road_request\GeneralRoadRequestController;
use App\Http\Controllers\TMO\general_road_request\AdminGeneralRoadRequestController;

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
Route::get('/register', [AuthController::class, 'RegisterPage'])->name('RegisterPage');
Route::post('/register', [AuthController::class, 'Register'])->name('Register');
Route::post('/login', [AuthController::class, 'Login'])->name('Login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [PagesController::class, 'Index'])->name('Index');
Route::get('/secondary/page', [PagesController::class, 'SeconDaryPage'])->name('SeconDaryPage');

//คำร้องทั่วไป
Route::get('/general-requests', [GeneralRequestsController::class, 'GeneralRequestsFormPage'])->name('GeneralRequestsFormPage');
Route::post('/general-requests/form/create', [GeneralRequestsController::class, 'GeneralRequestsFormCreate'])->name('GeneralRequestsFormCreate');

//คำร้องทั่วไป (แจ้งเรื่องไฟฟ้า)
Route::get('/general-electricity-request', [GeneralElectricityRequestController::class, 'GeneralElectricityRequestFormPage'])->name('GeneralElectricityRequestFormPage');
Route::post('/general-electricity-request/form/create', [GeneralElectricityRequestController::class, 'GeneralElectricityRequestFormCreate'])->name('GeneralElectricityRequestFormCreate');

//คำร้องทั่วไป (แจ้งถนนชำรุด)
Route::get('/general-road-request', [GeneralRoadRequestController::class, 'GeneralRoadRequestFormPage'])->name('GeneralRoadRequestFormPage');
Route::post('/general-road-request/form/create', [GeneralRoadRequestController::class, 'GeneralRoadRequestFormCreate'])->name('GeneralRoadRequestFormCreate');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'AdminIndex'])->name('AdminIndex');

    //คำร้องทั่วไป
    Route::get('/admin/general-requests/showdata', [AdminGeneralRequestsController::class, 'GeneralRequestsAdminShowData'])->name('GeneralRequestsAdminShowData');
    Route::get('/admin/general-requests/export-pdf/{id}', [AdminGeneralRequestsController::class, 'GeneralRequestsAdminExportPDF'])->name('GeneralRequestsAdminExportPDF');
    Route::post('/admin/general-requests/admin-reply/{id}', [AdminGeneralRequestsController::class, 'GeneralRequestsAdminReply'])->name('GeneralRequestsAdminReply');
    Route::post('/admin/general-requests/update-status/{id}', [AdminGeneralRequestsController::class, 'GeneralRequestsUpdateStatus'])->name('GeneralRequestsUpdateStatus');
});

Route::middleware(['user'])->group(function () {
    //คำร้องทั่วไป
    Route::get('/user-account/general-requests/show-details', [GeneralRequestsController::class, 'GeneralRequestsShowDetails'])->name('GeneralRequestsShowDetails');
    Route::get('/user-account/general-requests/export-pdf/{id}', [GeneralRequestsController::class, 'GeneralRequestsUserExportPDF'])->name('GeneralRequestsUserExportPDF');
    Route::post('/user-account/general-requests/reply/{id}', [GeneralRequestsController::class, 'GeneralRequestsUserReply'])->name('GeneralRequestsUserReply');
    Route::get('/user-account/general-requests/show-edit/{id}', [GeneralRequestsController::class, 'GeneralRequestsUserShowFormEdit'])->name('GeneralRequestsUserShowFormEdit');
    Route::put('/user-account/general-requests/update-data/{id}', [GeneralRequestsController::class, 'GeneralRequestsUserUpdateForm'])->name('GeneralRequestsUserUpdateForm');

    //คำร้องทั่วไป (แจ้งเรื่องไฟฟ้า)
    Route::get('/user-account/general-electricity-request/show-details', [GeneralElectricityRequestController::class, 'GeneralElectricityRequestShowDetails'])->name('GeneralElectricityRequestShowDetails');
    Route::get('/user-account/general-electricity-request/export-pdf/{id}', [GeneralElectricityRequestController::class, 'GeneralElectricityRequestUserExportPDF'])->name('GeneralElectricityRequestUserExportPDF');
    Route::post('/user-account/general-electricity-request/reply/{id}', [GeneralElectricityRequestController::class, 'GeneralElectricityRequestUserReply'])->name('GeneralElectricityRequestUserReply');
    Route::get('/user-account/general-electricity-request/show-edit/{id}', [GeneralElectricityRequestController::class, 'GeneralElectricityRequestUserShowFormEdit'])->name('GeneralElectricityRequestUserShowFormEdit');
    Route::put('/user-account/general-electricity-request/update-data/{id}', [GeneralElectricityRequestController::class, 'GeneralElectricityRequestUserUpdateForm'])->name('GeneralElectricityRequestUserUpdateForm');

    //คำร้องทั่วไป (แจ้งถนนชำรุด)
    Route::get('/user-account/general-road-request/show-details', [GeneralRoadRequestController::class, 'GeneralRoadRequestShowDetails'])->name('GeneralRoadRequestShowDetails');
    Route::get('/user-account/general-road-request/export-pdf/{id}', [GeneralRoadRequestController::class, 'GeneralRoadRequestUserExportPDF'])->name('GeneralRoadRequestUserExportPDF');
    Route::post('/user-account/general-road-request/reply/{id}', [GeneralRoadRequestController::class, 'GeneralRoadRequestUserReply'])->name('GeneralRoadRequestUserReply');
    Route::get('/user-account/general-road-request/show-edit/{id}', [GeneralRoadRequestController::class, 'GeneralRoadRequestUserShowFormEdit'])->name('GeneralRoadRequestUserShowFormEdit');
    Route::put('/user-account/general-road-request/update-data/{id}', [GeneralRoadRequestController::class, 'GeneralRoadRequestUserUpdateForm'])->name('GeneralRoadRequestUserUpdateForm');
});
