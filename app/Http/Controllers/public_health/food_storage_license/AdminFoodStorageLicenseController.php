<?php

namespace App\Http\Controllers\public_health\food_storage_license;

use App\Http\Controllers\Controller;
use App\Models\FoodStorageAppointmentLogs;
use App\Models\FoodStorageExploreLogs;
use App\Models\FoodStorageFormDetails;
use Illuminate\Http\Request;
use App\Models\FoodStorageInformations;
use App\Models\FoodStorageFormReplies;
use App\Models\FoodStorageLogs;
use App\Models\FoodStorageNumberLogs;
use App\Models\FoodStoragePaymentLogs;
use App\Models\FoodStorageType;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class AdminFoodStorageLicenseController extends Controller
{
    public function FoodStorageLicenseAdminShowData()
    {
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [1, 2]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.public_health.food_storage_license.show-data', compact('forms'));
    }

    public function FoodStorageLicenseAdminExportPDF($id)
    {
        $form = FoodStorageInformations::with('details')->find($id);

        $document_option = $form->details->first()->document_option ?? [];
        if (is_string($document_option)) {
            $document_option = json_decode($document_option, true);
        }

        $pdf = Pdf::loadView(
            'users.public_health.food_storage_license.pdf-form',
            compact('form', 'document_option')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }

    public function FoodStorageLicenseAdminReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        FoodStorageFormReplies::create([
            'informations_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }

    public function FoodStorageLicenseUpdateStatus($id)
    {
        $form = FoodStorageInformations::findOrFail($id);

        $form->form_status = 2;
        $form->admin_name_verifier = Auth::user()->name;
        $form->save();

        return redirect()->back()->with('success', 'คุณได้กดรับแบบฟอร์มเรียบร้อยแล้ว');
    }

    public function FoodStorageLicenseAdminDetail($id)
    {
        $form = FoodStorageInformations::with(['user', 'details', 'files', 'replies'])
            ->find($id);

        if ($form['details']->document_option != 'null') {
            $document_option = $form['details']->document_option;
            if (is_string($document_option)) {
                $form['details']->document_option = json_decode($document_option, true);
            }
        } else {
            $form['details']->document_option = [];
        }
        $types = FoodStorageType::all();

        return view('admin.public_health.food_storage_license.detail', compact('form', 'types'));
    }

    public function FoodStorageLicenseAdminConfirm($id)
    {
        $form = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [1, 2]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->find($id);

        if ($form['details']->document_option != 'null') {
            $document_option = $form['details']->document_option;
            if (is_string($document_option)) {
                $form['details']->document_option = json_decode($document_option, true);
            }
        } else {
            $form['details']->document_option = [];
        }
        $types = FoodStorageType::all();

        return view('admin.public_health.food_storage_license.confirm', compact('form', 'types'));
    }

    public function FoodStorageLicenseAdminConfirmSave(Request $request)
    {
        $input = $request->input();
        if ($input['id']) {
            $detail = FoodStorageFormDetails::where('informations_id', $input['id'])->first();
            if ($input['result'] != 2) {
                $detail->status = 3;
                if ($detail->save()) {
                    return redirect()->route('FoodStorageLicenseAdminShowData')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            } else {
                $detail->status = 2;
                if ($detail->save()) {
                    $insert = new FoodStorageLogs();
                    $insert->informations_id = $input['id'];
                    $insert->detail = $input['detail'];
                    $insert->created_at = date('Y-m-d H:i:s');
                    $insert->updated_at = date('Y-m-d H:i:s');
                    if ($insert->save()) {
                        return redirect()->route('FoodStorageLicenseAdminShowData')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                    }
                }
            }
        }
        return redirect()->route('FoodStorageLicenseAdminShowData')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodStorageLicenseAdminAppointment()
    {
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [3, 4, 5, 8]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->appointmentte = FoodStorageAppointmentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.public_health.food_storage_license.appointment', compact('forms'));
    }

    public function FoodStorageLicenseAdminCalendar($id)
    {
        $form = FoodStorageInformations::with(['user', 'details', 'files', 'replies'])->find($id);

        return view('admin.public_health.food_storage_license.calendar', compact('form'));
    }

    public function FoodStorageLicenseAdminCalendarSave(Request $request)
    {
        $input = $request->input();
        if ($input['id']) {
            $detail = FoodStorageFormDetails::where('informations_id', $input['id'])->first();
            $detail->status = 4;
            if ($detail->save()) {
                $insert = new FoodStorageAppointmentLogs();
                $insert->informations_id = $input['id'];
                $insert->title = $input['title'];
                $insert->detail = $input['detail'];
                $insert->date_admin = $input['date_admin'];
                $insert->status = 1;
                $insert->created_at = date('Y-m-d H:i:s');
                $insert->updated_at = date('Y-m-d H:i:s');
                if ($insert->save()) {
                    return redirect()->route('FoodStorageLicenseAdminAppointment')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            }
        }
        return redirect()->route('FoodStorageLicenseAdminAppointment')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodStorageLicenseAdminExplore()
    {
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [6]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->appointmentte = FoodStorageAppointmentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.public_health.food_storage_license.explore', compact('forms'));
    }

    public function FoodStorageLicenseAdminChecklist($id)
    {
        $form = FoodStorageInformations::with(['user', 'details', 'files', 'replies'])->find($id);

        return view('admin.public_health.food_storage_license.checklist', compact('form'));
    }

    public function FoodStorageLicenseAdminChecklistSave(Request $request)
    {
        $input = $request->input();
        if ($input['id']) {
            $path = '';
            if ($request->hasFile('formFile')) {
                $file = $request->file('formFile');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('checklist', $filename, 'public');
            }
            $detail = FoodStorageFormDetails::where('informations_id', $input['id'])->first();
            if ($input['result'] != 2) {
                $detail->status = 7;
                if ($detail->save()) {
                    $insert = new FoodStorageExploreLogs();
                    $insert->informations_id = $input['id'];
                    $insert->detail = $input['detail'];
                    $insert->file = $path;
                    $insert->price = $input['price'];
                    $insert->status = 1;
                    $insert->created_at = date('Y-m-d H:i:s');
                    $insert->updated_at = date('Y-m-d H:i:s');
                    if ($insert->save()) {
                        return redirect()->route('FoodStorageLicenseAdminExplore')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                    }
                }
            } else {
                $detail->status = 8;
                if ($detail->save()) {
                    $insert = new FoodStorageExploreLogs();
                    $insert->informations_id = $input['id'];
                    $insert->detail = $input['detail'];
                    $insert->file = $path;
                    $insert->price = $input['price'];
                    $insert->status = 2;
                    $insert->created_at = date('Y-m-d H:i:s');
                    $insert->updated_at = date('Y-m-d H:i:s');
                    if ($insert->save()) {
                        return redirect()->route('FoodStorageLicenseAdminExplore')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                    }
                }
            }
        }
        return redirect()->route('FoodStorageLicenseAdminExplore')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }


    public function FoodStorageLicenseAdminPayment()
    {
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [7, 9]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->payment = FoodStoragePaymentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.public_health.food_storage_license.payment', compact('forms'));
    }

    public function FoodStorageLicenseAdminPaymentCheck($id)
    {
        $form = FoodStorageInformations::with(['user', 'details', 'files', 'replies'])->find($id);

        $file = FoodStoragePaymentLogs::where('informations_id', $id)->first();
        return view('admin.public_health.food_storage_license.payment-check', compact('form', 'file'));
    }

    public function FoodStorageLicenseAdminPaymentSave(Request $request)
    {
        $input = $request->input();
        if ($input['id']) {
            $detail = FoodStorageFormDetails::where('informations_id', $input['id'])->first();
            $detail->status = 10;
            if ($detail->save()) {
                $path = '';
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('payment', $filename, 'public');
                }
                $update = FoodStoragePaymentLogs::find($input['file-id']);
                $update->receipt_book = $input['receipt_book'];
                $update->receipt_number = $input['receipt_number'];
                $update->file_treasury = $path;
                $update->status = 2;
                $update->updated_at = date('Y-m-d H:i:s');
                if ($update->save()) {
                    $number = FoodStorageNumberLogs::where('type', $detail['confirm_option'])->orderBy('id', 'desc')->first();
                    if ($number) {
                        $run_book = $number->book + 1;
                        $run_number = $number->number + 1;
                    } else {
                        if ($detail['confirm_option'] == 1) {
                            $run_number = 1;
                            $run_book = 7;
                        } else {
                            $run_number = 1;
                            $run_book = 8;
                        }
                    }

                    $insert = new FoodStorageNumberLogs();
                    $insert->informations_id = $input['id'];
                    $insert->number = $run_number;
                    $insert->book = $run_book;
                    $insert->year = date('Y') + 543;
                    $insert->type = $detail['confirm_option'];
                    $insert->created_at = date('Y-m-d');
                    $insert->updated_at = date('Y-m-d');
                    if ($insert->save()) {
                        return redirect()->route('FoodStorageLicenseAdminPayment')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                    }
                }
            }
        }
        return redirect()->route('FoodStorageLicenseAdminPayment')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodStorageLicenseAdminApprove()
    {
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [10, 11]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->payment = FoodStoragePaymentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.public_health.food_storage_license.approve', compact('forms'));
    }

    public function AdminCertificateFoodStorageLicensePDF($id)
    {
        $form = FoodStorageInformations::find($id);

        $explore = FoodStorageExploreLogs::where('informations_id', $form->id)->first();

        $file = FoodStoragePaymentLogs::where('informations_id', $form->id)->first();

        $info_number = FoodStorageNumberLogs::where('informations_id', $form->id)->first();

        if ($form['details']->confirm_option == 2) {
            $views = "admin.public_health.food_storage_license.pdf.food_storage_license";
        } else {
            $views = "admin.public_health.food_storage_license.pdf.food_sales";
        }
        $pdf = Pdf::loadView(
            $views,
            compact('form', 'file', 'info_number', 'explore')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }
}
