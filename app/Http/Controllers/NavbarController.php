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

    //******************************************Navbar Togo*********************************************** */
    public function navBar_tg($pays_id)
    {
        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
        
        return view('frontend.tg.navbar', compact('parametres'));
    }
    //******************************************End Navbar Togo*********************************************** */
}
