<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function header()
    {
        $parametres = Parametre::find(1);
        return view('frontend.tg.header.header', compact('parametres'));
    }
}
