<?php

namespace App\Http\Controllers\pay_tax_build_and_room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayTaxBuildAndRoom extends Controller
{
    public function PayTaxBuildAndRoomFormPage()
    {
        return view('users.pay_tax_build_and_room.page-form');
    }
}
