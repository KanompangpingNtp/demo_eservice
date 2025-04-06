<?php

namespace App\Http\Controllers\emergency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index()
    {
        return view('emergency.app');
    }
}
