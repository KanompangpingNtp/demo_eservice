<?php

namespace App\Http\Controllers\public_health\food_storage_license;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodStorageLicenseController extends Controller
{
    public function FoodStorageLicenseFormPage()
    {
        return view('users.public_health.food_storage_license.page-form');
    }

    public function FoodStorageLicenseFormCreate(Request $request)
    {
        $request->validate([
            'title_name' => 'required|in:บุคคลธรรมดา,นิติบุคคล',
            'salutation' => 'nullable|string|max:20',
            'full_name' => 'required|string|max:255',
            'age' => 'required|numeric|min:1|max:150',
            'nationality' => 'required|string|max:50',
            'id_card_number' => 'required|string|size:13',
            'address' => 'required|string|max:255',
            'village' => 'required|string|max:50',
            'alley' => 'required|string|max:100',
            'road' => 'required|string|max:100',
            'subdistrict' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'telephone' => 'required|string|max:20',
            'fax' => 'required|string|max:20',

            // ตัวอย่างถ้ามีแนบไฟล์
            // 'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);


        dd($request);

        // $gerForm = GeneralElectricityRequestForm::create([
        //     'users_id' => auth()->id(),
        //     'status' => 1,
        //     'date' => $request->date,
        //     'subject' => $request->subject,
        //     'salutation' => $request->salutation,
        //     'name' => $request->name,
        //     'age' => $request->age,
        //     'house_number' => $request->house_number,
        //     'village' => $request->village,
        //     'subdistrict' => $request->subdistrict,
        //     'district' => $request->district,
        //     'province' => $request->province,
        //     'phone' => $request->phone,
        //     'request_details' => $request->request_details,
        //     'included' => $request->included,
        //     'proceedings' => $request->proceedings,
        // ]);

        // if ($request->hasFile('attachments')) {
        //     foreach ($request->file('attachments') as $file) {
        //         $filename = time() . '_' . $file->getClientOriginalName();

        //         $path = $file->storeAs('general-electricity-request', $filename, 'public');

        //         GeneralElectricityRequestFiles::create([
        //             'ger_form_id' => $gerForm->id,
        //             'file_path' => $path,
        //             'file_type' => $file->getClientMimeType(),
        //         ]);
        //     }
        // }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }
}
