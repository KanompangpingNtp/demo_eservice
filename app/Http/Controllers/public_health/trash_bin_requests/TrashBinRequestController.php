<?php

namespace App\Http\Controllers\public_health\trash_bin_requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrashBinRequestController extends Controller
{
    public function TrashBinRequestPage()
    {
        return view('users.public_health.trash_bin_requests.page-form');
    }
}
