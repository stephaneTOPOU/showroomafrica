<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function annonce()
    {
        $parametres = Parametre::find(1);
        return view('frontend.annonce',compact('parametres'));
    }
}
