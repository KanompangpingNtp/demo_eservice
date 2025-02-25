<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Index ()
    {
        return view('pages.first-page.app');
    }

    public function SeconDaryPage ()
    {
        return view('pages.secondary-page.app');
    }
}
