<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\change_in_use\ChangeInUse;
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
use App\Http\Controllers\ops\receive_assistance\ReceiveAssistanceController;
use App\Http\Controllers\ops\receive_assistance\AdminReceiveAssistanceController;
use App\Http\Controllers\pay_tax_build_and_room\PayTaxBuildAndRoom;
use App\Http\Controllers\public_health\food_storage_license\FoodStorageLicenseController;
use App\Http\Controllers\public_health\food_storage_license\AdminFoodStorageLicenseController;
use App\Http\Controllers\public_health\health_hazard_applications\HealthHazardApplicationController;
use App\Http\Controllers\public_health\health_hazard_applications\AdminHealthHazardApplicationController;
use App\Http\Controllers\public_health\trash_bin_requests\TrashBinRequestController;
use App\Http\Controllers\public_health\trash_bin_requests\AdminTrashBinRequestController;

use App\Http\Controllers\treasury_department\tax_refund_requests\LandTaxRefundRequestController;
use App\Http\Controllers\treasury_department\tax_refund_requests\AdminLandTaxRefundRequestController;
use App\Http\Controllers\treasury_department\land_building_tax_appeals\LandBuildingTaxAppealController;
use App\Http\Controllers\treasury_department\land_building_tax_appeals\AdminLandBuildingTaxAppealController;

use App\Http\Controllers\TestController;
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

//
Route::get('/trash_bin_requests', [TrashBinRequestController::class, 'TrashBinRequestPage'])->name('TrashBinRequestPage');
Route::post('/trash_bin_requests/form/create', [TrashBinRequestController::class, 'TrashBinRequestFormCreate'])->name('TrashBinRequestFormCreate');

//
Route::get('/receive_assistance', [ReceiveAssistanceController::class, 'ReceiveAssistanceFormPage'])->name('ReceiveAssistanceFormPage');
Route::post('/receive_assistance/form/create', [ReceiveAssistanceController::class, 'ReceiveAssistanceFormCreate'])->name('ReceiveAssistanceFormCreate');

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

//คำร้องคัดค้านการประเมินภาษี
Route::get('/land_building_tax_appeals', [LandBuildingTaxAppealController::class, 'LandBuildingTaxAppealPage'])->name('LandBuildingTaxAppealPage');
Route::post('/land_building_tax_appeals/form/create', [LandBuildingTaxAppealController::class, 'LandBuildingTaxAppealFormCreate'])->name('LandBuildingTaxAppealFormCreate');

//คำร้องขอรับเงินภาษีที่ดินและสิ่งปลูกสร้างคืน
Route::get('/tax_refund_requests', [LandTaxRefundRequestController::class, 'LandTaxRefundRequestPage'])->name('LandTaxRefundRequestPage');
Route::post('/tax_refund_requests/form/create', [LandTaxRefundRequestController::class, 'LandTaxRefundRequestFormCreate'])->name('LandTaxRefundRequestFormCreate');

//(ภ.ด.ส.๕) แบบแจ้งการเปลี่ยนแปลงการใช้ประโยชน์ที่ดินหรือสิ่งปลูกสร้าง
Route::get('/pay_tax_build_and_room', [PayTaxBuildAndRoom::class, 'PayTaxBuildAndRoomFormPage'])->name('PayTaxBuildAndRoomFormPage');
Route::post('/pay_tax_build_and_room/form/create', [PayTaxBuildAndRoom::class, 'PayTaxBuildAndRoomFormCreate'])->name('PayTaxBuildAndRoomFormCreate');
//(ภ.ด.ส.๕) แบบแจ้งการเปลี่ยนแปลงการใช้ประโยชน์ที่ดินหรือสิ่งปลูกสร้าง
Route::get('/change_in_use', [ChangeInUse::class, 'ChangeInUseFormPage'])->name('ChangeInUseFormPage');
Route::post('/change_in_use/form/create', [ChangeInUse::class, 'ChangeInUseFormCreate'])->name('ChangeInUseFormCreate');

//users disability
Route::get('/disability', [DisabilityController::class, 'DisabilityFormPage'])->name('DisabilityFormPage');
Route::post('/disability/form/create', [DisabilityController::class, 'DisabilityFormCreate'])->name('DisabilityFormCreate');

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

    //admin ReceiveAssistance
    Route::get('/TablePages/ReceiveAssistance', [AdminReceiveAssistanceController::class, 'TableReceiveAssistanceAdminPages'])->name('TableReceiveAssistanceAdminPages');
    Route::post('/TablePages/ReceiveAssistance/AdminReply/{id}', [AdminReceiveAssistanceController::class, 'ReceiveAssistanceAdminReply'])->name('ReceiveAssistanceAdminReply');
    Route::get('/TablePages/ReceiveAssistance/ExportPdf/{id}', [AdminReceiveAssistanceController::class, 'ReceiveAssistanceAdminExportPDF'])->name('ReceiveAssistanceAdminExportPDF');
    Route::post('/TablePages/ReceiveAssistance/{id}/update-status', [AdminReceiveAssistanceController::class, 'ReceiveAssistanceUpdateStatus'])->name('ReceiveAssistanceUpdateStatus');

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
    Route::get('/admin/food_storage_license/appointment', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminAppointment'])->name('FoodStorageLicenseAdminAppointment');
    Route::get('/admin/food_storage_license/explore', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminExplore'])->name('FoodStorageLicenseAdminExplore');
    Route::get('/admin/food_storage_license/payment', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminPayment'])->name('FoodStorageLicenseAdminPayment');
    Route::get('/admin/food_storage_license/approve', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminApprove'])->name('FoodStorageLicenseAdminApprove');
    Route::get('/admin/food_storage_license/export-pdf/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminExportPDF'])->name('FoodStorageLicenseAdminExportPDF');
    Route::get('/admin/food_storage_license/calendar/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminCalendar'])->name('FoodStorageLicenseAdminCalendar');
    Route::get('/admin/food_storage_license/checklist/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminChecklist'])->name('FoodStorageLicenseAdminChecklist');
    Route::get('/admin/food_storage_license/payment-check/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminPaymentCheck'])->name('FoodStorageLicenseAdminPaymentCheck');
    Route::get('/admin/food_storage_license/detail/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminDetail'])->name('FoodStorageLicenseAdminDetail');
    Route::get('/admin/food_storage_license/confirm/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminConfirm'])->name('FoodStorageLicenseAdminConfirm');
    Route::put('/admin/food_storage_license/confirm', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminConfirmSave'])->name('FoodStorageLicenseAdminConfirmSave');
    Route::put('/admin/food_storage_license/checklistSave', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminChecklistSave'])->name('FoodStorageLicenseAdminChecklistSave');
    Route::put('/admin/food_storage_license/calendarSave', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminCalendarSave'])->name('FoodStorageLicenseAdminCalendarSave');
    Route::put('/admin/food_storage_license/paymentSave', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminPaymentSave'])->name('FoodStorageLicenseAdminPaymentSave');
    Route::post('/admin/food_storage_license/admin-reply/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminReply'])->name('FoodStorageLicenseAdminReply');
    Route::post('/admin/food_storage_license/update-status/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseUpdateStatus'])->name('FoodStorageLicenseUpdateStatus');
    Route::get('/admin/certificate/food_storage_license/export-pdf/{id}', [AdminFoodStorageLicenseController::class, 'AdminCertificateFoodStorageLicensePDF'])->name('AdminCertificateFoodStorageLicensePDF');
    //แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
    Route::get('/admin/health_hazard_applications/showdata', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminShowData'])->name('HealthHazardApplicationAdminShowData');
    Route::get('/admin/health_hazard_applications/appointment', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminAppointment'])->name('HealthHazardApplicationAdminAppointment');
    Route::get('/admin/health_hazard_applications/export-pdf/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminExportPDF'])->name('HealthHazardApplicationAdminExportPDF');
    Route::post('/admin/health_hazard_applications/admin-reply/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminReply'])->name('HealthHazardApplicationAdminReply');
    Route::post('/admin/health_hazard_applications/update-status/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationUpdateStatus'])->name('HealthHazardApplicationUpdateStatus');
    Route::get('/admin/health_hazard_applications/confirm/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminConfirm'])->name('HealthHazardApplicationAdminConfirm');
    Route::put('/admin/health_hazard_applications/confirm', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminConfirmSave'])->name('HealthHazardApplicationAdminConfirmSave');
    Route::get('/admin/health_hazard_applications/detail/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminDetail'])->name('HealthHazardApplicationAdminDetail');
    Route::get('/admin/health_hazard_applications/calendar/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminCalendar'])->name('HealthHazardApplicationAdminCalendar');
    Route::put('/admin/health_hazard_applications/calendarSave', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminCalendarSave'])->name('HealthHazardApplicationAdminCalendarSave');
    Route::get('/admin/health_hazard_applications/explore', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminExplore'])->name('HealthHazardApplicationAdminExplore');
    Route::get('/admin/health_hazard_applications/checklist/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminChecklist'])->name('HealthHazardApplicationAdminChecklist');
    Route::put('/admin/health_hazard_applications/checklistSave', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminChecklistSave'])->name('HealthHazardApplicationAdminChecklistSave');
    Route::get('/admin/health_hazard_applications/payment', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminPayment'])->name('HealthHazardApplicationAdminPayment');
    Route::get('/admin/health_hazard_applications/payment-check/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminPaymentCheck'])->name('HealthHazardApplicationAdminPaymentCheck');
    Route::put('/admin/health_hazard_applications/paymentSave', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminPaymentSave'])->name('HealthHazardApplicationAdminPaymentSave');
    Route::get('/admin/health_hazard_applications/approve', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminApprove'])->name('HealthHazardApplicationAdminApprove');
    Route::get('/admin/certificate/health_hazard_applications/export-pdf/{id}', [AdminHealthHazardApplicationController::class, 'AdminCertificateHealthHazardApplicationPDF'])->name('AdminCertificateHealthHazardApplicationPDF');
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

    //แบบคำร้องใบอณุญาตสะสมอาหาร
    Route::get('/food_storage_license', [FoodStorageLicenseController::class, 'FoodStorageLicenseFormPage'])->name('FoodStorageLicenseFormPage');
    Route::post('/food_storage_license/form/create', [FoodStorageLicenseController::class, 'FoodStorageLicenseFormCreate'])->name('FoodStorageLicenseFormCreate');

    //แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
    Route::get('/health_hazard_applications', [HealthHazardApplicationController::class, 'HealthHazardApplicationFormPage'])->name('HealthHazardApplicationFormPage');
    Route::post('/health_hazard_applications/form/create', [HealthHazardApplicationController::class, 'HealthHazardApplicationFormCreate'])->name('HealthHazardApplicationFormCreate');

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
    Route::get('/user-account/certificate/food_storage_license/export-pdf/{id}', [FoodStorageLicenseController::class, 'CertificateFoodStorageLicensePDF'])->name('CertificateFoodStorageLicensePDF');
    Route::get('/user-account/certificate/food_sales/export-pdf/{id}', [FoodStorageLicenseController::class, 'CertificateFoodSalesPDF'])->name('CertificateFoodSalesPDF');
    Route::get('/user-account/food_storage_license/detail/{id}', [FoodStorageLicenseController::class, 'FoodStorageLicenseDetail'])->name('FoodStorageLicenseDetail');
    Route::get('/user-account/food_storage_license/calendar/{id}', [FoodStorageLicenseController::class, 'FoodStorageLicenseCalendar'])->name('FoodStorageLicenseCalendar');
    Route::get('/user-account/food_storage_license/payment/{id}', [FoodStorageLicenseController::class, 'FoodStorageLicensePayment'])->name('FoodStorageLicensePayment');
    Route::put('/user-account/food_storage_license/paymentSave', [FoodStorageLicenseController::class, 'FoodStorageLicensePaymentSave'])->name('FoodStorageLicensePaymentSave');
    Route::put('/user-account/food_storage_license/calendarSave', [FoodStorageLicenseController::class, 'FoodStorageLicenseCalendarSave'])->name('FoodStorageLicenseCalendarSave');

    //แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
    Route::get('/user-account/health_hazard_applications/show-details', [HealthHazardApplicationController::class, 'HealthHazardApplicationShowDetails'])->name('HealthHazardApplicationShowDetails');
    Route::get('/user-account/health_hazard_applications/export-pdf/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserExportPDF'])->name('HealthHazardApplicationUserExportPDF');
    Route::post('/user-account/health_hazard_applications/reply/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserReply'])->name('HealthHazardApplicationUserReply');
    Route::get('/user-account/health_hazard_applications/show-edit/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserShowFormEdit'])->name('HealthHazardApplicationUserShowFormEdit');
    Route::get('/user-account/certificate/health_hazard_applications/export-pdf/{id}', [HealthHazardApplicationController::class, 'CertificateHealthHazardPDF'])->name('CertificateHealthHazardPDF');
    Route::get('/user-account/health_hazard_applications/detail/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationDetail'])->name('HealthHazardApplicationDetail');
    Route::get('/user-account/health_hazard_applications/calendar/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationCalendar'])->name('HealthHazardApplicationCalendar');
    Route::put('/user-account/health_hazard_applications/calendarSave', [HealthHazardApplicationController::class, 'HealthHazardApplicationCalendarSave'])->name('HealthHazardApplicationCalendarSave');
    Route::get('/user-account/health_hazard_applications/payment/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationPayment'])->name('HealthHazardApplicationPayment');
    Route::put('/user-account/health_hazard_applications/paymentSave', [HealthHazardApplicationController::class, 'HealthHazardApplicationPaymentSave'])->name('HealthHazardApplicationPaymentSave');

    //users ReceiveAssistance
    Route::get('/user/account/ReceiveAssistance/record', [ReceiveAssistanceController::class, 'TableReceiveAssistanceUsersPages'])->name('TableReceiveAssistanceUsersPages');
    Route::post('/user/account/ReceiveAssistance/{form}/reply', [ReceiveAssistanceController::class, 'ReceiveAssistanceUserReply'])->name('ReceiveAssistanceUserReply');
    Route::get('/user/account/ReceiveAssistance/{id}/pdf', [ReceiveAssistanceController::class, 'ReceiveAssistanceUserExportPDF'])->name('ReceiveAssistanceUserExportPDF');
    Route::get('/user/account/ReceiveAssistance/{id}/edit', [ReceiveAssistanceController::class, 'ReceiveAssistanceUsersShowFormEdit'])->name('ReceiveAssistanceUsersShowFormEdit');
    Route::put('/user/account/ReceiveAssistance/{id}/Update', [ReceiveAssistanceController::class, 'updateReceiveAssistance'])->name('updateReceiveAssistance');

    //คำร้องคัดค้านการประเมินภาษีหรือ การเรียกเก็บภาษีที่ดินและสิ่งปลูกสร้าง
    Route::get('/user/account/LandBuildingTaxAppeal/show-details', [LandBuildingTaxAppealController::class, 'LandBuildingTaxAppealShowDetails'])->name('LandBuildingTaxAppealShowDetails');
    Route::post('/user/account/LandBuildingTaxAppeal/{form}/reply', action: [LandBuildingTaxAppealController::class, 'LandBuildingTaxAppealUserReply'])->name('LandBuildingTaxAppealUserReply');
    Route::get('/user/account/LandBuildingTaxAppeal/{id}/pdf', [LandBuildingTaxAppealController::class, 'LandBuildingTaxAppealUserExportPDF'])->name('LandBuildingTaxAppealUserExportPDF');

    //คำร้องขอรับเงินภาษีที่ดินและสิ่งปลูกสร้างคืน
    Route::get('/user/account/TaxRefundRequest/show-details', [LandTaxRefundRequestController::class, 'LandTaxRefundRequestShowDetails'])->name('LandTaxRefundRequestShowDetails');
    Route::post('/user/account/TaxRefundRequest/{form}/reply', [LandTaxRefundRequestController::class, 'LandTaxRefundRequestUserReply'])->name('LandTaxRefundRequestUserReply');
    Route::get('/user/account/TaxRefundRequest/{id}/pdf', [LandTaxRefundRequestController::class, 'LandTaxRefundRequestUserExportPDF'])->name('LandTaxRefundRequestUserExportPDF');

    //แบบคำร้องขอใช้ถังขยะ
    Route::get('/user/account/TrashBinRequest/show-details', [TrashBinRequestController::class, 'TrashBinRequestShowDetails'])->name('TrashBinRequestShowDetails');
    Route::post('/user/account/TrashBinRequest/{form}/reply', [TrashBinRequestController::class, 'TrashBinRequestUserReply'])->name('TrashBinRequestUserReply');
    Route::get('/user/account/TrashBinRequest/{id}/pdf', [TrashBinRequestController::class, 'TrashBinRequestUserExportPDF'])->name('TrashBinRequestUserExportPDF');
});

Route::get('/emergency', [EmergencyController::class, 'index'])->name('emergency.index');
Route::post('/emergency/send', [EmergencyController::class, 'send'])->name('emergency.send');

//test
Route::get('/form/pdf', [TestController::class, 'formPDF'])->name('formPDF');
Route::get('/form/pdf/1', [TestController::class, 'formExportPDF1'])->name('formExportPDF1');
Route::get('/form/pdf/2', [TestController::class, 'formExportPDF2'])->name('formExportPDF2');
Route::get('/form/pdf/3', [TestController::class, 'formExportPDF3'])->name('formExportPDF3');
Route::get('/form/pdf/4', [TestController::class, 'formExportPDF4'])->name('formExportPDF4');
Route::get('/form/pdf/5', [TestController::class, 'formExportPDF5'])->name('formExportPDF5');
Route::get('/form/pdf/6', [TestController::class, 'formExportPDF6'])->name('formExportPDF6');
