<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessionnelController extends Controller
{
    public function professionnel()
    {
        return view('frontend.professionnel');
    }
}
