<?php

namespace App\Http\Controllers\treasury_department\land_building_tax_appeals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandBuildingTaxAppealController extends Controller
{
    public function LandBuildingTaxAppealPage ()
    {
        return view('users.treasury_department.land_building_tax_appeals.page-form');
    }
}
