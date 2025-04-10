<?php

namespace App\Http\Controllers\treasury_department\tax_refund_requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandTaxRefundRequestController extends Controller
{
    public function LandTaxRefundRequestPage ()
    {
        return view('users.treasury_department.tax_refund_requests.page-form');
    }
}
