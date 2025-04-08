<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodStorageInformations;
use App\Models\HealthLicenseApp;

class TestController extends Controller
{
    public function pdfTest ()
    {
        $FoodStorageInformations = FoodStorageInformations::with(['files','details'])->get();

        $HealthLicenseApp = HealthLicenseApp::with(['files'])->get();

        return view('certificate.test.page',compact('FoodStorageInformations','HealthLicenseApp'));
    }
}
