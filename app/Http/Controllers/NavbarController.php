<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavbarController extends Controller
{
    public function navBar()
    {    
        $parametres = Parametre::find(1);
        return view('frontend.navbar', compact('parametres'));
    }

}
