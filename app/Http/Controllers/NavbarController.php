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



    //******************************************Navbar côte d'ivoire*********************************************** */
    public function navBar_ci($pays_id)
    {
        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 2)
            ->select('*')
            ->get();
        
        return view('frontend.ci.navbar', compact('parametres'));
    }
    //******************************************End Navbar côte d'ivoire*********************************************** */




    //******************************************Navbar Niger*********************************************** */
    public function navBar_ne($pays_id)
    {
        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 3)
            ->select('*')
            ->get();
        
        return view('frontend.ne.navbar', compact('parametres'));
    }
    //******************************************End Navbar Niger*********************************************** */




    
    //******************************************Navbar Burkina faso*********************************************** */
    public function navBar_bf($pays_id)
    {
        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 4)
            ->select('*')
            ->get();
        
        return view('frontend.bf.navbar', compact('parametres'));
    }
    //******************************************End Navbar Burkina faso*********************************************** */
}
