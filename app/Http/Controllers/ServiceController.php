<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
//**********************************************************site web ************************************* */
    public function siteweb()
    {
        $parametres = Parametre::find(1);
        
        return view('frontend.siteweb', compact('parametres'));
    }


//**********************************************************site web  Togo************************************* */
    public function siteweb_tg($pays_id)
    {
        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
        
        return view('frontend.tg.siteweb', compact('parametres'));
    }

//**********************************************************End site web Togo************************************* */




//**********************************************************site web  côte d'ivoire************************************* */
public function siteweb_ci($pays_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();
    
    return view('frontend.ci.siteweb', compact('parametres'));
}

//**********************************************************End site web côte d'ivoire************************************* */


//**********************************************************End site web ************************************* */
}
