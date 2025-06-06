<?php

namespace App\Http\Controllers\ops\disability;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisabilityPerson;
use App\Models\DisabilityTrader;
use App\Models\DisabilityOption;
use App\Models\DisabilityAttachment;
use App\Models\DisabilityBankac;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DisabilityReply;
use Carbon\Carbon;

class DisabilityController extends Controller
{
    public function DisabilityFormPage()
    {
        return view('users.ops.disability.page-form');
    }

    public function DisabilityFormCreate(Request $request)
    {
        $written_date = Carbon::now()->format('Y-m-d');
        $birth_day = $request->birth_day ? Carbon::createFromFormat('d/m/Y', $request->birth_day)->format('Y-m-d') : null;

        $request->validate([
            // 'written_at' => 'required|string',
            // // 'written_date' => 'required|date',
            // 'salutation' => 'required|string',
            // 'first_name' => 'required|string',
            // 'last_name' => 'required|string',
            // 'birth_day' => 'nullable|date',
            // 'age' => 'nullable|integer',
            // 'nationality' => 'nullable|string',
            // 'house_number' => 'nullable|string',
            // 'village' => 'nullable|string',
            // 'community' => 'nullable|string',
            // 'alley' => 'nullable|string',
            // 'road' => 'nullable|string',
            // 'subdistrict' => 'nullable|string',
            // 'district' => 'nullable|string',
            // 'province' => 'nullable|string',
            // 'postal_code' => 'nullable|string',
            // 'phone_number' => 'nullable|string',
            // 'citizen_id' => 'nullable|string',
            // 'marital_status' => 'required|in:single,married,widowed,divorced,separated,other',
            // 'monthly_income' => 'nullable|string',
            // 'occupation' => 'nullable|string',
            // 'references_contacted' => 'nullable|string',
            // 'references_phone' => 'nullable|string',
            // 'welfare_type' => 'nullable|array',
            // 'welfare_type.*' => 'string|in:option1,option2,option3,option4',
            // 'welfare_other_types' => 'nullable|string|required_if:welfare_type.*,ย้ายภูมิลําเนาเข้ามาอยู่ใหม่',
            // 'request_for_money_type' => 'required|string|in:option1,option2,option3,option4',
            // 'document_type' => 'nullable|array',
            // 'document_type.*' => 'string|in:option1,option2,option3,option4,option5',
            // 'bank_option' => 'nullable|boolean',
            // 'bank_name' => 'nullable|string',
            // 'account_number' => 'nullable|string',
            // 'account_name' => 'nullable|string',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',

            // 'type_of_disability' => 'string|in:option1,option2,option3,option4,option5,option6,option7',
            // 'trade_condition' => 'required|string|in:option1,option2,option3,option4,option5',
        ]);

        // dd( $request);

        // Save data to DisabilityPeople table
        $eaPeople = DisabilityPerson::create([
            'users_id' => auth()->id(),
            'status' => 1,
            'written_at' => $request->written_at,
            'written_date' => $written_date,
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_day' => $birth_day,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'house_number' => $request->house_number,
            'village' => $request->village,
            'alley' => $request->alley,
            'road' => $request->road,
            'subdistrict' => $request->subdistrict,
            'district' => $request->district,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->phone_number,
            'citizen_id' => $request->citizen_id,
            'type_of_disability' => $request->type_of_disability,
            'marital_status' => $request->marital_status,
            'monthly_income' => $request->monthly_income,
            'occupation' => $request->occupation,
            'references_contacted' => $request->references_contacted,
            'references_phone' => $request->references_phone,
            'community' => $request->community,
        ]);

        // Save data to DisabilityOptions table
        $eaPersonsOptions = DisabilityOption::create([
            'disability_people_id' => $eaPeople->id,
            'welfare_type' => json_encode($request->welfare_type),
            'welfare_other_types' => $request->welfare_other_types,
            'request_for_money_type' => $request->request_for_money_type,
            'document_type' => json_encode($request->document_type),
        ]);

        // Save bank details if available
        if ($request->has('bank_option') && $request->bank_option == 1 && $request->filled('bank_name') && $request->filled('account_number') && $request->filled('account_name')) {
            $eaBankacOption = DisabilityBankac::create([
                'disability_people_id' => $eaPeople->id,
                'bank_option' => 1,
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'account_name' => $request->account_name,
            ]);
        }

        // Save file attachments if available
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('attachments', $filename, 'public');

                DisabilityAttachment::create([
                    'disability_people_id' => $eaPeople->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }

    public function TableDisabilityUsersPages()
    {
        $forms = DisabilityPerson::with(['user', 'disabilityAttachments', 'disabilityReplies'])
        ->where('users_id', Auth::id())
        ->get();

        return view('users.ops.disability.account.show-detail', compact('forms'));
    }

    public function DisabilityUserShowEdit($id)
    {

        $form = DisabilityPerson::with('disabilityTraders', 'disabilityOptions', 'disabilityAttachments', 'disabilityBankAccounts')->findOrFail($id);
        // dd($form->type_of_disability);
        if ($form->disabilityOptions->first() && $form->disabilityOptions->first()->welfare_type) {
            $welfareType = $form->disabilityOptions->first()->welfare_type;
            if (is_string($welfareType)) {
                $form->disabilityOptions->first()->welfare_type = json_decode($welfareType, true);
            }
        }

        return view('users.ops.disability.account.edit-data', compact('form'));
    }

    public function DisabilityUserFormUpdate(Request $request, $id)
    {
        $request->validate([
            'written_at' => 'required|string',
            // 'written_date' => 'required|date',
            'salutation' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_day' => 'nullable|date',
            'age' => 'nullable|integer',
            'nationality' => 'nullable|string',
            'house_number' => 'nullable|string',
            'village' => 'nullable|string',
            'community' => 'nullable|string',
            'alley' => 'nullable|string',
            'road' => 'nullable|string',
            'subdistrict' => 'nullable|string',
            'district' => 'nullable|string',
            'province' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'citizen_id' => 'nullable|string',
            'marital_status' => 'required|in:single,married,widowed,divorced,separated,other',
            'monthly_income' => 'nullable|string',
            'occupation' => 'nullable|string',
            'references_contacted' => 'nullable|string',
            'references_phone' => 'nullable|string',
            'welfare_type' => 'nullable|array',
            'welfare_type.*' => 'string|in:option1,option2,option3,option4',
            'welfare_other_types' => 'nullable|string|required_if:welfare_type.*,ย้ายภูมิลําเนาเข้ามาอยู่ใหม่',
            'request_for_money_type' => 'required|string|in:option1,option2,option3,option4',
            'document_type' => 'nullable|array',
            'document_type.*' => 'string|in:option1,option2,option3,option4,option5',
            'bank_option' => 'nullable|boolean',
            'bank_name' => 'nullable|string',
            'account_number' => 'nullable|string',
            'account_name' => 'nullable|string',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',

            'type_of_disability' => 'string|in:option1,option2,option3,option4,option5,option6,option7',
        ]);

        // dd($request);

        $DisabilityPerson = DisabilityPerson::findOrFail($id);
        $DisabilityPerson->update([
            'written_at' => $request->written_at,
            'written_date' => $request->written_date,
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_day' => $request->birth_day,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'house_number' => $request->house_number,
            'village' => $request->village,
            'alley' => $request->alley,
            'road' => $request->road,
            'subdistrict' => $request->subdistrict,
            'district' => $request->district,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->phone_number,
            'citizen_id' => $request->citizen_id,
            'type_of_disability' => $request->type_of_disability,
            'marital_status' => $request->marital_status,
            'monthly_income' => $request->monthly_income,
            'occupation' => $request->occupation,
        ]);

        $DisabilityOption = DisabilityOption::where('disability_people_id', $id)->firstOrFail();
        $welfareOtherTypes = in_array('option4', $request->welfare_type ?? []) ? $request->welfare_other_types : null;
        $DisabilityOption->update([
            'welfare_type' => json_encode($request->welfare_type),
            'welfare_other_types' => $welfareOtherTypes,
            'request_for_money_type' => $request->request_for_money_type,
            'document_type' => json_encode($request->document_type),
        ]);

        if ($request->has('bank_option') && $request->bank_option == 1) {
            // กรณีที่ checkbox ถูกเลือก
            if ($request->filled('bank_name') && $request->filled('account_number') && $request->filled('account_name')) {
                $DisabilityBankac = DisabilityBankac::where('disability_people_id', $id)->first();
                if ($DisabilityBankac) {
                    // ถ้ามีข้อมูลในฐานข้อมูล ให้ทำการอัปเดต
                    $DisabilityBankac->update([
                        'bank_option' => 1,
                        'bank_name' => $request->bank_name,
                        'account_number' => $request->account_number,
                        'account_name' => $request->account_name,
                    ]);
                } else {
                    // ถ้ายังไม่มีข้อมูลในฐานข้อมูล ให้สร้างข้อมูลใหม่
                    DisabilityBankac::create([
                        'disability_people_id' => $DisabilityPerson->id,
                        'bank_option' => 1,
                        'bank_name' => $request->bank_name,
                        'account_number' => $request->account_number,
                        'account_name' => $request->account_name,
                    ]);
                }
            }
        } else {
            $DisabilityBankac = DisabilityBankac::where('disability_people_id', $id)->first(); // แก้โมเดลที่อ้างอิง
            if ($DisabilityBankac) {
                // ลบข้อมูลถ้ามีอยู่ในฐานข้อมูล
                $DisabilityBankac->delete();
            }
        }

        if ($request->has('delete_attachments')) {
            foreach ($request->delete_attachments as $attachmentId) {
                $attachment = DisabilityAttachment::find($attachmentId);
                if ($attachment) {
                    Storage::disk('public')->delete($attachment->file_path);
                    $attachment->delete();
                }
            }
        }

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('attachments', $filename, 'public');

                DisabilityAttachment::create([
                    'disability_people_id' => $DisabilityPerson->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Updated successfully!');
    }

    public function DisabilityUserExportPDF($id)
    {
        $form = DisabilityPerson::with('disabilityTraders', 'disabilityOptions', 'disabilityBankAccounts')->find($id);

        if ($form->disabilityOptions->first() && $form->disabilityOptions->first()->welfare_type) {
            $welfareType = $form->disabilityOptions->first()->welfare_type;
            if (is_string($welfareType)) {
                $form->disabilityOptions->first()->welfare_type = json_decode($welfareType, true);
            }
        }

        $documentType = $form->disabilityOptions->first()->document_type ?? [];
        if (is_string($documentType)) {
            $documentType = json_decode($documentType, true);
        }

        $pdf = Pdf::loadView('users.ops.disability.pdf-form', compact('form', 'documentType'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('แบบคำขอยืนยันสิทธิรับเงินเบี้ยยังชีพผู้สูงอายุ' . $form->id . '.pdf');
    }

    public function DisabilityUserReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        DisabilityReply::create([
            'disability_people_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }
}
