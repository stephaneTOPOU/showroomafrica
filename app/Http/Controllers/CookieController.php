<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function Cookie()
    {
        return view('frontend.cookie');
    }
}
