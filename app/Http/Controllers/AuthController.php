<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function entreprise()
    {
        return view('frontend.entreprise.enregistrer');
    }
}
