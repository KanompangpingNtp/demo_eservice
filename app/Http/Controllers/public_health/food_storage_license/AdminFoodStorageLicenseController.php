<?php

namespace App\Http\Controllers\public_health\food_storage_license;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodStorageInformations;
use App\Models\FoodStorageFormReplies;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class AdminFoodStorageLicenseController extends Controller
{
    public function FoodStorageLicenseAdminShowData()
    {
        $forms = FoodStorageInformations::with(['user', 'files', 'replies'])
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

        $pdf = Pdf::loadView('users.public_health.food_storage_license.pdf-form',
        compact('form', 'document_option'))->setPaper('A4', 'portrait');

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
}
