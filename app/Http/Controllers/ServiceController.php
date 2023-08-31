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






//**********************************************************site web  Niger************************************* */
public function siteweb_ne($pays_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 3)
        ->select('*')
        ->get();
    
    return view('frontend.ne.siteweb', compact('parametres'));
}

//**********************************************************End site web Niger************************************* */




//**********************************************************site web  Burkina faso************************************* */
public function siteweb_bf($pays_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 4)
        ->select('*')
        ->get();
    
    return view('frontend.bf.siteweb', compact('parametres'));
}

//**********************************************************End site web Burkina faso************************************* */






//**********************************************************site web  Bénin************************************* */
public function siteweb_bj($pays_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 5)
        ->select('*')
        ->get();
    
    return view('frontend.bj.siteweb', compact('parametres'));
}

//**********************************************************End site web Bénin************************************* */


//**********************************************************End site web ************************************* */
}
