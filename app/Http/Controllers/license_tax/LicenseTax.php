<?php

namespace App\Http\Controllers\license_tax;

use App\Http\Controllers\Controller;
use App\Models\LicenseTaxFormDetails;
use App\Models\LicenseTaxFormFiles;
use App\Models\LicenseTaxInformations;
use Illuminate\Http\Request;

class LicenseTax extends Controller
{
    public function LicenseTaxFormPage()
    {
        return view('users.license_tax.page-form');
    }

    public function LicenseTaxFormCreate(Request $request)
    {
        $LicenseTax = LicenseTaxInformations::create([
            'users_id' => auth()->id(),
            'form_status' => 1,
        ]);

        $LicenseTaxdetail = LicenseTaxFormDetails::create([
            'license_tax_id' => $LicenseTax->id,
            'salutation' => $request->salutation,
            'full_name' => $request->full_name,
            'build_name' => $request->build_name,
            'address' => $request->address,
            'alley' => $request->alley,
            'village' => $request->village,
            'road' => $request->road,
            'subdistrict' => $request->subdistrict,
            'district' => $request->district,
            'province' => $request->province,
            'telephone' => $request->telephone,
            'emp_fullname' => $request->emp_fullname,
            'build_wide_1' => $request->build_wide_1,
            'build_long_1' => $request->build_long_1,
            'build_meter_1' => $request->build_meter_1,
            'build_amount_1' => $request->build_amount_1,
            'build_text_1' => $request->build_text_1,
            'build_place_1' => $request->build_place_1,
            'build_date_1' => $request->build_date_1,
            'build_remark_1' => $request->build_remark_1,
            'build_wide_2' => $request->build_wide_2,
            'build_long_2' => $request->build_long_2,
            'build_meter_2' => $request->build_meter_2,
            'build_amount_2' => $request->build_amount_2,
            'build_text_2' => $request->build_text_2,
            'build_place_2' => $request->build_place_2,
            'build_date_2' => $request->build_date_2,
            'build_remark_2' => $request->build_remark_2,
            'build_wide_3' => $request->build_wide_3,
            'build_long_3' => $request->build_long_3,
            'build_meter_3' => $request->build_meter_3,
            'build_amount_3' => $request->build_amount_3,
            'build_text_3' => $request->build_text_3,
            'build_place_3' => $request->build_place_3,
            'build_date_3' => $request->build_date_3,
            'build_remark_3' => $request->build_remark_3,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('attachments', $filename, 'public');

                LicenseTaxFormFiles::create([
                    'license_tax_id' => $LicenseTax->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }
        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }
}
