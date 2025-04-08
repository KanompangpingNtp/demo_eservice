<?php

namespace App\Http\Controllers\public_health\health_hazard_applications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HealthLicenseApp;
use App\Models\HealthLicenseDetail;
use App\Models\HealthLicenseFiles;
use App\Models\HealthLicenseReplies;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class HealthHazardApplicationController extends Controller
{
    public function HealthHazardApplicationFormPage()
    {
        return view('users.public_health.health_hazard_applications.page-form');
    }

    public function HealthHazardApplicationFormCreate(Request $request)
    {
        $request->validate([
            'title_name' => 'required|in:บุคคลธรรมดา,นิติบุคคล',
            'salutation' => 'nullable|string|max:20',
            'full_name' => 'required|string|max:255',
            'age' => 'required|numeric|min:1|max:150',
            'nationality' => 'required|string|max:50',
            'id_card_number' => 'required|string|size:13',
            'address' => 'required|string|max:255',
            'village' => 'required|string',
            'alley' => 'required|string|max:100',
            'road' => 'required|string|max:100',
            'subdistrict' => 'required|string',
            'district' => 'required|string',
            'province' => 'required|string',
            'telephone' => 'required|string',
            'fax' => 'required|string',

            'type_request' => 'required|string|max:255',
            'petition' => 'required|string|max:255',
            'name_establishment' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'details_village' => 'nullable|string|max:255',
            'details_alley' => 'nullable|string|max:255',
            'details_road' => 'nullable|string|max:255',
            'details_subdistrict' => 'nullable|string|max:255',
            'details_district' => 'nullable|string|max:255',
            'details_province' => 'nullable|string|max:255',
            'details_telephone' => 'nullable|string|max:255',
            'details_fax' => 'nullable|string|max:255',
            'business_area' => 'nullable|string|max:255',
            'machine_power' => 'nullable|string|max:255',
            'number_male_workers' => 'nullable|string|max:255',
            'number_female_workers' => 'nullable|string|max:255',
            'opening_hours' => 'nullable|string|max:255',
            'opening_for_business_until' => 'nullable|string|max:255',
            'document_option' => 'nullable|array|min:1',
            'document_option.*' => 'in:option1,option2,option3,option4,option5,option6,option7,option8',
            'document_option_detail' => 'nullable|required_if:document_option.*,"option8"|string|max:255',

        ]);

        // dd($request);

        $HealthLicenseApp = HealthLicenseApp::create([
            'users_id' => auth()->id(),
            'form_status' => 1,
            'title_name' => $request->title_name,
            'salutation' => $request->salutation,
            'full_name' => $request->full_name,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'id_card_number' => $request->id_card_number,
            'address' => $request->address,
            'village' => $request->village,
            'alley' => $request->alley,
            'road' => $request->road,
            'subdistrict' => $request->subdistrict,
            'district' => $request->district,
            'province' => $request->province,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
        ]);

        $HealthLicenseDetail = HealthLicenseDetail::create([
            'health_license_id' => $HealthLicenseApp->id,
            'type_request' => $request->type_request,
            'petition' => $request->petition,
            'name_establishment' => $request->name_establishment,
            'location' => $request->location,
            'details_village' => $request->details_village,
            'details_alley' => $request->details_alley,
            'details_road' => $request->details_road,
            'details_subdistrict' => $request->details_subdistrict,
            'details_district' => $request->details_district,
            'details_province' => $request->details_province,
            'details_telephone' => $request->details_telephone,
            'details_fax' => $request->details_fax,
            'business_area' => $request->business_area,
            'machine_power' => $request->machine_power,
            'number_male_workers' => $request->number_male_workers,
            'number_female_workers' => $request->number_female_workers,
            'opening_hours' => $request->opening_hours,
            'opening_for_business_until' => $request->opening_for_business_until,
            'document_option' => json_encode($request->document_option),
            'document_option_detail' => $request->document_option_detail,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('attachments', $filename, 'public');

                HealthLicenseFiles::create([
                    'health_license_id' => $HealthLicenseApp->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }

    public function HealthHazardApplicationShowDetails()
    {
        $forms = HealthLicenseApp::with(['user', 'files', 'replies'])
        ->where('users_id', Auth::id())
        ->get();

        return view('users.public_health.health_hazard_applications.account.show-detail', compact('forms'));
    }

    public function HealthHazardApplicationUserExportPDF($id)
    {
        $form = HealthLicenseApp::with('details')->find($id);

        $document_option = $form->details->first()->document_option ?? [];
        if (is_string($document_option)) {
            $document_option = json_decode($document_option, true);
        }

        $pdf = Pdf::loadView('users.public_health.health_hazard_applications.pdf-form',
        compact('form', 'document_option'))->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }

    public function HealthHazardApplicationUserReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // dd($request);

        HealthLicenseReplies::create([
            'health_license_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }

    public function HealthHazardApplicationUserShowFormEdit($id)
    {
        $form = HealthLicenseApp::with('files','details')->findOrFail($id);

        if ($form->details->first() && $form->details->first()->document_option) {
            $document_option = $form->details->first()->document_option;
            if (is_string($document_option)) {
                $form->details->first()->document_option = json_decode($document_option, true);
            }
        }

        return view('users.public_health.health_hazard_applications.account.edit-data', compact('form'));
    }

    public function CertificateHealthHazardUserPDF($id)
    {
        $form = HealthLicenseApp::with('details')->find($id);

        $document_option = $form->details->first()->document_option ?? [];
        if (is_string($document_option)) {
            $document_option = json_decode($document_option, true);
        }

        $pdf = Pdf::loadView('certificate.health_hazard_applications',
        compact('form', 'document_option'))->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }
}
