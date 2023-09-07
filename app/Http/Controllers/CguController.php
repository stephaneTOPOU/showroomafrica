<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CguController extends Controller
{
    public function Cgu()
    {            
        return view('frontend.cgu');
    }
}
