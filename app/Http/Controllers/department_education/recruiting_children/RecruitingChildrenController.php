<?php

namespace App\Http\Controllers\department_education\recruiting_children;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildInformation;
use App\Models\CaregiverInformation;
use App\Models\SurrenderTheChild;
use App\Models\ChildRegistration;
use App\Models\ChildAttachment;
use App\Models\ChildReply;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecruitingChildrenController extends Controller
{
    public function ChildApplyPage()
    {
        return view('users.department_education.recruiting_children.page-form');
    }

    public function ChildApplyFormCreate(Request $request)
    {
        $birthday = $request->birthday ? Carbon::createFromFormat('d/m/Y', $request->birthday)->format('Y-m-d') : null;
        $registration_birthday = $request->registration_birthday ? Carbon::createFromFormat('d/m/Y', $request->registration_birthday)->format('Y-m-d') : null;
        $request->validate([
            'full_name' => 'nullable|string|max:255',
            'ethnicity' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'age' => 'nullable|integer|min:0',
            'age_months' => 'nullable|integer|min:0',
            'citizen_id' => 'nullable|string|max:20',
            'age_since_date' => 'nullable|date',
            'regis_house_number' => 'nullable|string|max:255',
            'regis_village' => 'nullable|string|max:255',
            'regis_road' => 'nullable|string|max:255',
            'regis_subdistrict' => 'nullable|string|max:255',
            'regis_district' => 'nullable|string|max:255',
            'regis_province' => 'nullable|string|max:255',
            'current_house_number' => 'nullable|string|max:255',
            'current_village' => 'nullable|string|max:255',
            'current_road' => 'nullable|string|max:255',
            'current_subdistrict' => 'nullable|string|max:255',
            'current_district' => 'nullable|string|max:255',
            'current_province' => 'nullable|string|max:255',
            'current_phone_number' => 'nullable|string|max:20',
            'number_of_siblings' => 'nullable|string|max:255',
            'congenital_disease' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:10',

            // // Validation Rules for Caregiver Information
            'father_name' => 'nullable|string|max:255',
            'edu_qual_father' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'edu_qual_mother' => 'nullable|string|max:255',
            'care_option' => 'nullable|string|max:255',
            'care_option_other' => 'nullable|string|max:255',
            'care_option_relative_text' => 'nullable|string|max:255',

            'caretaker_income' => 'nullable|string|max:255',
            'applicants_name' => 'nullable|string|max:255',
            'applicants_relevant' => 'nullable|string|max:255',
            'child_carrier_name' => 'nullable|string|max:255',
            'child_carrier_relevant' => 'nullable|string|max:255',
            'child_carrier_phone' => 'nullable|string|max:20',
            'father_occupation' => 'nullable|string|max:255',
            'mother_occupation' => 'nullable|string|max:255',

            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',

            // //Validation Rules for surrender_the_child
            'surrender_salutation' => 'nullable|string|max:255',
            'surrender_full_name' => 'nullable|string|max:255',
            'surrender_age' => 'nullable|integer|min:1|max:120',
            'surrender_occupation' => 'nullable|string|max:255',
            'surrender_income' => 'nullable|string|max:255',
            'surrender_village' => 'nullable|string|max:255',
            'surrender_alley_road' => 'nullable|string|max:255',
            'surrender_subdistrict' => 'nullable|string|max:255',
            'surrender_district' => 'nullable|string|max:255',
            'surrender_province' => 'nullable|string|max:255',
            'surrender_phone_number' => 'nullable|string|max:255',
            'surrender_childs_name' => 'nullable|string|max:255',
            'surrender_contact_location' => 'nullable|string|max:255',
            'surrender_contact_phone' => 'nullable|string|max:255',
            'surrender_child_recipient' => 'nullable|string|max:255',
            'child_recipient_relevant' => 'nullable|string|max:255',
            'child_recipient_related' => 'nullable|string|max:255',
            'child_recipient_phone' => 'nullable|string|max:255',
            'child_recipient_salutation' => 'nullable|string|max:255',

            'the_child_number' => 'nullable|string|max:255',

            // 'child_surrender_salutation1' => 'nullable|string|max:255',
            // 'child_salutation' => 'nullable|string|max:255',

            // // //ChildRegistration
            // 'child_name' => 'nullable|string|max:255',
            // 'child_nickname' => 'nullable|string|max:255',
            // 'registration_citizen_id' => 'nullable|string',
            // 'registration_birthday' => 'nullable|date',
            // 'birth_province' => 'nullable|string|max:255',
            // 'registration_ethnicity' => 'nullable|string|max:255',
            // 'registration_nationality' => 'nullable|string|max:255',
            // 'religion' => 'nullable|string|max:255',
            // 'house_number' => 'nullable|string|max:50',
            // 'village' => 'nullable|string|max:50',
            // 'alley' => 'nullable|string|max:255',
            // 'alley_road' => 'nullable|string|max:255',
            // 'subdistrict' => 'nullable|string|max:255',
            // 'district' => 'nullable|string|max:255',
            // 'province' => 'nullable|string|max:255',

            // 'health_option' => 'nullable|in:option_1,option_2',
            // 'health_option_detail' => 'nullable|string|max:255',
            // 'registration_blood_group' => 'nullable|in:option_1,option_2,option_3,option_4,option_5',
            // 'blood_group_detail' => 'nullable|string|max:255',


            // 'registration_congenital_disease' => 'nullable|string|max:255',
            // 'edited_by' => 'nullable|string|max:255',
            // 'drug_allergy' => 'nullable|string|max:255',
            // 'drug_allergy_detail' => 'nullable|string|max:255',
            // 'accident_history' => 'nullable|string|max:255',
            // 'accident_history_when_age' => 'nullable|string|max:255',
            // // 'ge_immunity' => 'nullable|in:option_1,option_2,option_3,option_4,option_5,option_6,option_7,option_8',
            // 'ge_immunity' => 'nullable|array',
            // 'ge_immunity.*' => 'in:option_1,option_2,option_3,option_4,option_5,option_6,option_7,option_8',
            // 'ge_immunity_detail' => 'nullable|string|max:255',
            // 'specially_about' => 'nullable|string|max:255',
            // 'the_eldest_son' => 'nullable|string|max:255',
            // 'registration_number_of_siblings' => 'nullable|string|max:255',
            // 'elder_brother' => 'nullable|string|max:255',
            // 'younger_brother' => 'nullable|string|max:255',
            // 'elder_sister' => 'nullable|string|max:255',
            // 'younger_sister' => 'nullable|string|max:255',

            // 'fathers_name' => 'nullable|string|max:255',
            // 'fathers_age' => 'nullable|string|max:255',
            // 'fathers_occupation' => 'nullable|string|max:255',
            // 'fathers_workplace' => 'nullable|string|max:255',
            // 'fathers_phone' => 'nullable|string|max:255',
            // 'registration_mother_name' => 'nullable|string|max:255',
            // 'mother_age' => 'nullable|string|max:255',
            // 'registration_mother_occupation' => 'nullable|string|max:255',
            // 'mother_workplace' => 'nullable|string|max:255',
            // 'mother_phone' => 'nullable|string|max:255',
            // 'marital_status' => 'nullable|in:option_1,option_2,option_3,option_4,option_5',
            // 'marital_status_details' => 'nullable|nullable_if:marital_status,option_5|string|max:255',
            // 'parent_name' => 'nullable|string|max:255',
            // 'parent_age' => 'nullable|integer|min:0',
            // 'parent_relevant_as' => 'nullable|string|max:255',
            // 'parent_occupation' => 'nullable|string|max:255',
            // 'parent_workplace' => 'nullable|string|max:255',
            // 'parent_phone' => 'nullable|string|max:255',
            // 'marital_status_details' => 'nullable|string|max:255',

            'surrender_hour_number' => 'nullable|string|max:255',
        ]);

       dd($request);

        // Prepare data for insertion
        $ChildInformation = ChildInformation::create([
            'users_id' => auth()->id(),
            'status' => '1',
            'admin_name_verifier' => null,
            'full_name' => $request->full_name,
            'ethnicity' => $request->ethnicity,
            'nationality' => $request->nationality,
            'birthday' => $birthday,
            'age' => $request->age,
            'age_months' => $request->age_months,
            'citizen_id' => $request->citizen_id,
            'age_since_date' => $request->age_since_date,
            'regis_house_number' => $request->regis_house_number,
            'regis_village' => $request->regis_village,
            'regis_road' => $request->regis_road,
            'regis_subdistrict' => $request->regis_subdistrict,
            'regis_district' => $request->regis_district,
            'regis_province' => $request->regis_province,
            'current_house_number' => $request->current_house_number,
            'current_village' => $request->current_village,
            'current_road' => $request->current_road,
            'current_subdistrict' => $request->current_subdistrict,
            'current_district' => $request->current_district,
            'current_province' => $request->current_province,
            'current_phone_number' => $request->current_phone_number,
            'number_of_siblings' => $request->number_of_siblings,
            'congenital_disease' => $request->congenital_disease,
            'blood_group' => $request->blood_group,
            'the_child_number' => $request->the_child_number,
        ]);

        $caregiverInformation = CaregiverInformation::create([
            'child_information_id' => $ChildInformation->id,
            'father_name' => $request->father_name,
            'edu_qual_father' => $request->edu_qual_father,
            'mother_name' => $request->mother_name,
            'edu_qual_mother' => $request->edu_qual_mother,
            'care_option' => $request->care_option,
            'care_option_other' => $request->care_option == 'Other' ? $request->care_option_other : null,
            'care_option_relative_text' => $request->care_option_relative_text,
            'caretaker_income' => $request->caretaker_income,
            'applicants_name' => $request->applicants_name,
            'applicants_relevant' => $request->applicants_relevant,
            'child_carrier_name' => $request->child_carrier_name,
            'child_carrier_relevant' => $request->child_carrier_relevant,
            'child_carrier_phone' => $request->child_carrier_phone,
            'father_occupation' => $request->father_occupation,
            'mother_occupation' => $request->mother_occupation
        ]);

        $SurrenderTheChild = SurrenderTheChild::create([
            'child_information_id' => $ChildInformation->id,
            'salutation' => $request->surrender_salutation,
            'full_name' => $request->surrender_full_name,
            'age' => $request->surrender_age,
            'occupation' => $request->surrender_occupation,
            'income' => $request->surrender_income,
            'hour_number' => $request->surrender_hour_number,
            'village' => $request->surrender_village,
            'alley_road' => $request->surrender_alley_road,
            'subdistrict' => $request->surrender_subdistrict,
            'district' => $request->surrender_district,
            'province' => $request->surrender_province,
            'phone_number' => $request->surrender_phone_number,
            'childs_name' => $request->surrender_childs_name,
            'contact_location' => $request->surrender_contact_location,
            'contact_phone' => $request->surrender_contact_phone,
            'child_recipient' => $request->surrender_child_recipient,
            'child_recipient_relevant' => $request->child_recipient_relevant,
            'child_recipient_phone' => $request->child_recipient_phone,
            'child_recipient_related' => $request->child_recipient_related,
            'child_recipient_salutation' => $request->child_recipient_salutation,
            'child_surrender_salutation' => $request->child_surrender_salutation,
            'child_surrender_salutation1' => $request->child_surrender_salutation1,
            'child_salutation' => $request->child_salutation,
        ]);

        // $ChildRegistration = ChildRegistration::create([
        //     'child_information_id' => $ChildInformation->id,
        //     'child_name' => $request->child_name,
        //     'child_nickname' => $request->child_nickname,
        //     'citizen_id' => $request->registration_citizen_id,
        //     'birthday' => $registration_birthday,
        //     'birth_province' => $request->birth_province,
        //     'ethnicity' => $request->registration_ethnicity,
        //     'nationality' => $request->registration_nationality,
        //     'religion' => $request->religion,
        //     'house_number' => $request->house_number,
        //     'village' => $request->village,
        //     'alley' => $request->alley,
        //     'alley_road' => $request->alley_road,
        //     'subdistrict' => $request->subdistrict,
        //     'district' => $request->district,
        //     'province' => $request->province,

        //     'health_option' => $request->health_option,
        //     'health_option_detail' => $request->health_option_detail,
        //     'blood_group' => $request->registration_blood_group,
        //     'congenital_disease' => $request->congenital_disease,
        //     'edited_by' => $request->edited_by,
        //     'drug_allergy' => $request->drug_allergy,
        //     'drug_allergy_detail' => $request->drug_allergy_detail,
        //     'accident_history' => $request->accident_history,
        //     'accident_history_when_age' => $request->accident_history_when_age,
        //     'ge_immunity' => json_encode($request->ge_immunity),
        //     'ge_immunity_detail' => $request->ge_immunity_detail,
        //     'specially_about' => $request->specially_about,
        //     'the_eldest_son' => $request->the_eldest_son,
        //     'number_of_siblings' => $request->registration_number_of_siblings,
        //     'elder_brother' => $request->elder_brother,
        //     'younger_brother' => $request->younger_brother,
        //     'elder_sister' => $request->elder_sister,
        //     'younger_sister' => $request->younger_sister,

        //     'fathers_name' => $request->fathers_name,
        //     'fathers_age' => $request->fathers_age,
        //     'fathers_occupation' => $request->fathers_occupation,
        //     'fathers_workplace' => $request->fathers_workplace,
        //     'fathers_phone' => $request->fathers_phone,
        //     'mother_name' => $request->registration_mother_name,
        //     'mother_age' => $request->mother_age,
        //     'mother_occupation' => $request->registration_mother_occupation,
        //     'mother_workplace' => $request->mother_workplace,
        //     'mother_phone' => $request->mother_phone,
        //     'marital_status' => $request->marital_status,
        //     'parent_name' => $request->parent_name,
        //     'parent_age' => $request->parent_age,
        //     'parent_relevant_as' => $request->parent_relevant_as,
        //     'parent_occupation' => $request->parent_occupation,
        //     'parent_workplace' => $request->parent_workplace,
        //     'parent_phone' => $request->parent_phone,
        //     'blood_group_detail' => $request->blood_group_detail,
        //     'marital_status_details' => $request->marital_status_details,
        // ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('attachments', $filename, 'public');

                ChildAttachment::create([
                    'child_information_id' => $ChildInformation->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }

    public function TableChildApplyUsersPages()
    {
        $forms = ChildInformation::with(['user', 'attachments', 'replies'])
            ->where('users_id', Auth::id())
            ->get();

        return view('users.department_education.recruiting_children.account.show-detail', compact('forms'));
    }

    public function ChildApplyUserExportPDF($id)
    {
        $form = ChildInformation::with('caregiverInformation', 'surrenderTheChild', 'childRegistration')->find($id);

        if ($form->childRegistration->first() && $form->childRegistration->first()->ge_immunity) {
            $geImmunity = $form->childRegistration->first()->ge_immunity;
            $form->childRegistration->first()->ge_immunity = json_decode($geImmunity, true); // Decode JSON to array
        }

        $selectedOptions = $form->childRegistration->first()->ge_immunity ?? [];

        $pdf = Pdf::loadView('users.department_education.recruiting_children.pdf-form', compact('form', 'selectedOptions'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('แบบฟอร์มใบสมัคร ศูนย์พัฒนาเด็กเล็ก' . $form->id . '.pdf');
    }

    public function ChildApplyUserReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'nullable|string|max:1000',
        ]);

        ChildReply::create([
            'child_information_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }
}
