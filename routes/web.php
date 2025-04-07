<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\emergency\EmergencyController;

use App\Http\Controllers\TMO\general_electricity_request\GeneralElectricityRequestController;
use App\Http\Controllers\TMO\general_electricity_request\AdminGeneralElectricityRequestController;
use App\Http\Controllers\TMO\general_road_request\GeneralRoadRequestController;
use App\Http\Controllers\TMO\general_road_request\AdminGeneralRoadRequestController;

use App\Http\Controllers\ops\Generalrequests\GeneralRequestsController;
use App\Http\Controllers\ops\Generalrequests\AdminGeneralRequestsController;
use App\Http\Controllers\ops\elderly_allowance\ElderlyAllowanceController;
use App\Http\Controllers\ops\elderly_allowance\AdminElderlyAllowanceController;
use App\Http\Controllers\ops\disability\DisabilityController;
use App\Http\Controllers\ops\disability\AdminDisabilityController;

use App\Http\Controllers\public_health\food_storage_license\FoodStorageLicenseController;
use App\Http\Controllers\public_health\food_storage_license\AdminFoodStorageLicenseController;
use App\Http\Controllers\public_health\health_hazard_applications\HealthHazardApplicationController;
use App\Http\Controllers\public_health\health_hazard_applications\AdminHealthHazardApplicationController;

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

//users disability
Route::get('/disability', [DisabilityController::class, 'DisabilityFormPage'])->name('DisabilityFormPage');
Route::post('/disability/form/create', [DisabilityController::class, 'DisabilityFormCreate'])->name('DisabilityFormCreate');

//แบบคำร้องใบอณุญาตสะสมอาหาร
Route::get('/food_storage_license', [FoodStorageLicenseController::class, 'FoodStorageLicenseFormPage'])->name('FoodStorageLicenseFormPage');
Route::post('/food_storage_license/form/create', [FoodStorageLicenseController::class, 'FoodStorageLicenseFormCreate'])->name('FoodStorageLicenseFormCreate');

//แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
Route::get('/health_hazard_applications', [HealthHazardApplicationController::class, 'HealthHazardApplicationFormPage'])->name('HealthHazardApplicationFormPage');
Route::post('/health_hazard_applications/form/create', [HealthHazardApplicationController::class, 'HealthHazardApplicationFormCreate'])->name('HealthHazardApplicationFormCreate');

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

//แบบยืนยันสิทธิผู้สูงอายุ
Route::get('/elderly-allowance', [ElderlyAllowanceController::class, 'ElderlyAllowanceFormPage'])->name('ElderlyAllowanceFormPage');
Route::post('/elderly-allowance/form/create', [ElderlyAllowanceController::class, 'ElderlyAllowanceFormCreate'])->name('ElderlyAllowanceFormCreate');

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

    //แบบยืนยันสิทธิผู้สูงอายุ
    Route::get('/admin/elderly-allowance/showdata', [AdminElderlyAllowanceController::class, 'ElderlyAllowanceAdminShowData'])->name('ElderlyAllowanceAdminShowData');
    Route::get('/admin/elderly-allowance/export-pdf/{id}', [AdminElderlyAllowanceController::class, 'ElderlyAllowanceAdminExportPDF'])->name('ElderlyAllowanceAdminExportPDF');
    Route::post('/admin/elderly-allowance/admin-reply/{id}', [AdminElderlyAllowanceController::class, 'ElderlyAllowanceAdminReply'])->name('ElderlyAllowanceAdminReply');
    Route::post('/admin/elderly-allowance/update-status/{id}', [AdminElderlyAllowanceController::class, 'ElderlyAllowanceUpdateStatus'])->name('ElderlyAllowanceUpdateStatus');

    //แบบคำขอลงทะเบียนรับเงินเบี้ยความพิการ
    Route::get('/admin/disability/showdata', [AdminDisabilityController::class, 'DisabilityAdminShowData'])->name('DisabilityAdminShowData');
    Route::get('/admin/disability/export-pdf/{id}', [AdminDisabilityController::class, 'DisabilityExportPDF'])->name('DisabilityExportPDF');
    Route::post('/admin/disability/admin-reply/{id}', [AdminDisabilityController::class, 'DisabilityAdminReply'])->name('DisabilityAdminReply');
    Route::post('/admin/disability/update-status/{id}', [AdminDisabilityController::class, 'DisabilityUpdateStatus'])->name('DisabilityUpdateStatus');

    //คำร้องทั่วไป (แจ้งถนนชำรุด)
    Route::get('/admin/general-road-request/showdata', [AdminGeneralRoadRequestController::class, 'GeneralRoadRequestAdminShowData'])->name('GeneralRoadRequestAdminShowData');
    Route::get('/admin/general-road-request/export-pdf/{id}', [AdminGeneralRoadRequestController::class, 'GeneralRoadRequestAdminExportPDF'])->name('GeneralRoadRequestAdminExportPDF');
    Route::post('/admin/general-road-request/admin-reply/{id}', [AdminGeneralRoadRequestController::class, 'GeneralRoadRequestAdminReply'])->name('GeneralRoadRequestAdminReply');
    Route::post('/admin/general-road-request/update-status/{id}', [AdminGeneralRoadRequestController::class, 'GeneralRoadRequestUpdateStatus'])->name('GeneralRoadRequestUpdateStatus');

    //คำร้องทั่วไป (แจ้งเรื่องไฟฟ้า)
    Route::get('/admin/general-electricity-request/showdata', [AdminGeneralElectricityRequestController::class, 'GeneralElectricityRequestAdminShowData'])->name('GeneralElectricityRequestAdminShowData');
    Route::get('/admin/general-electricity-request/export-pdf/{id}', [AdminGeneralElectricityRequestController::class, 'GeneralElectricityRequestAdminExportPDF'])->name('GeneralElectricityRequestAdminExportPDF');
    Route::post('/admin/general-electricity-request/admin-reply/{id}', [AdminGeneralElectricityRequestController::class, 'GeneralElectricityRequestAdminReply'])->name('GeneralElectricityRequestAdminReply');
    Route::post('/admin/general-electricity-request/update-status/{id}', [AdminGeneralElectricityRequestController::class, 'GeneralElectricityRequestUpdateStatus'])->name('GeneralElectricityRequestUpdateStatus');

    //แบบคำร้องใบอณุญาตสะสมอาหาร
    Route::get('/admin/food_storage_license/showdata', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminShowData'])->name('FoodStorageLicenseAdminShowData');
    Route::get('/admin/food_storage_license/export-pdf/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminExportPDF'])->name('FoodStorageLicenseAdminExportPDF');
    Route::post('/admin/food_storage_license/admin-reply/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminReply'])->name('FoodStorageLicenseAdminReply');
    Route::post('/admin/food_storage_license/update-status/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseUpdateStatus'])->name('FoodStorageLicenseUpdateStatus');

    //แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
    Route::get('/admin/health_hazard_applications/showdata', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminShowData'])->name('HealthHazardApplicationAdminShowData');
    Route::get('/admin/health_hazard_applications/export-pdf/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminExportPDF'])->name('HealthHazardApplicationAdminExportPDF');
    Route::post('/admin/health_hazard_applications/admin-reply/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminReply'])->name('HealthHazardApplicationAdminReply');
    Route::post('/admin/health_hazard_applications/update-status/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationUpdateStatus'])->name('HealthHazardApplicationUpdateStatus');
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

    //แบบยืนยันสิทธิผู้สูงอายุ
    Route::get('/user-account/elderly-allowance/show-details', [ElderlyAllowanceController::class, 'ElderlyAllowanceShowDetails'])->name('ElderlyAllowanceShowDetails');
    Route::get('/user-account/elderly-allowance/export-pdf/{id}', [ElderlyAllowanceController::class, 'ElderlyAllowanceUserExportPDF'])->name('ElderlyAllowanceUserExportPDF');
    Route::post('/user-account/elderly-allowance/reply/{id}', [ElderlyAllowanceController::class, 'ElderlyAllowanceUserReply'])->name('ElderlyAllowanceUserReply');
    Route::get('/user-account/elderly-allowance/show-edit/{id}', [ElderlyAllowanceController::class, 'ElderlyAllowanceUserShowEdit'])->name('ElderlyAllowanceUserShowEdit');
    Route::put('/user-account/elderly-allowance/update-data/{id}', [ElderlyAllowanceController::class, 'ElderlyAllowanceUserUpdateForm'])->name('ElderlyAllowanceUserUpdateForm');

    //แบบคำขอลงทะเบียนรับเงินเบี้ยความพิการ
    Route::get('/user/account/Disability/record', [DisabilityController::class, 'TableDisabilityUsersPages'])->name('TableDisabilityUsersPages');
    Route::get('/user/account/Disability/{id}/edit', [DisabilityController::class, 'DisabilityUserShowEdit'])->name('DisabilityUserShowEdit');
    Route::put('/user/account/Disability/{id}/Update', [DisabilityController::class, 'DisabilityUserFormUpdate'])->name('DisabilityUserFormUpdate');
    Route::get('/user/account/Disability/{id}/pdf', [DisabilityController::class, 'DisabilityUserExportPDF'])->name('DisabilityUserExportPDF');
    Route::post('/user/account/Disability/{form}/reply', [DisabilityController::class, 'DisabilityUserReply'])->name('DisabilityUserReply');

    //แบบคำร้องใบอณุญาตสะสมอาหาร
    Route::get('/user-account/food_storage_license/show-details', [FoodStorageLicenseController::class, 'FoodStorageLicenseShowDetails'])->name('FoodStorageLicenseShowDetails');
    Route::get('/user-account/food_storage_license/export-pdf/{id}', [FoodStorageLicenseController::class, 'FoodStorageLicenseUserExportPDF'])->name('FoodStorageLicenseUserExportPDF');
    Route::post('/user-account/food_storage_license/reply/{id}', [FoodStorageLicenseController::class, 'FoodStorageLicenseUserReply'])->name('FoodStorageLicenseUserReply');
    Route::get('/user-account/food_storage_license/show-edit/{id}', [FoodStorageLicenseController::class, 'FoodStorageLicenseUserShowFormEdit'])->name('FoodStorageLicenseUserShowFormEdit');

    //แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
    Route::get('/user-account/health_hazard_applications/show-details', [HealthHazardApplicationController::class, 'HealthHazardApplicationShowDetails'])->name('HealthHazardApplicationShowDetails');
    Route::get('/user-account/health_hazard_applications/export-pdf/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserExportPDF'])->name('HealthHazardApplicationUserExportPDF');
    Route::post('/user-account/health_hazard_applications/reply/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserReply'])->name('HealthHazardApplicationUserReply');
    Route::get('/user-account/health_hazard_applications/show-edit/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserShowFormEdit'])->name('HealthHazardApplicationUserShowFormEdit');


});

Route::get('/emergency', [EmergencyController::class, 'index'])->name('emergency.index');
Route::post('/emergency/send', [EmergencyController::class, 'send'])->name('emergency.send');
