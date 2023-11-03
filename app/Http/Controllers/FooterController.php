<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
{
    public function footer()
    {
        $parametres = Parametre::find(1);

        return view('frontend.footer.footer', compact('parametres'));
    }
}
