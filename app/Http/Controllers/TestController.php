<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodStorageInformations;
use App\Models\HealthLicenseApp;
use Barryvdh\DomPDF\Facade\Pdf;

class TestController extends Controller
{
    public function pdfTest ()
    {
        $FoodStorageInformations = FoodStorageInformations::with(['files','details'])->get();

        $HealthLicenseApp = HealthLicenseApp::with(['files'])->get();

        return view('certificate.test.page',compact('FoodStorageInformations','HealthLicenseApp'));
    }

    public function formPDF ()
    {
        return view('test.page');
    }

    public function formExportPDF1()
    {
        $pdf = Pdf::loadView('test.pdf.pdf1')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF2()
    {
        $pdf = Pdf::loadView('test.pdf.pdf2')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF3()
    {
        $pdf = Pdf::loadView('test.pdf.pdf3')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF4()
    {
        $pdf = Pdf::loadView('test.pdf.pdf4')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF5()
    {
        $pdf = Pdf::loadView('test.pdf.pdf5')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF6()
    {
        $pdf = Pdf::loadView('test.pdf.pdf6')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }
}
