<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacieController extends Controller
{
//*********************************************Pharmacie*************************************** */
    public function pharmacie()
    {

        $parametres = Parametre::find(1);
        
        $pharmacies = DB::table('entreprises')->where('est_pharmacie', 1)
            ->where('pharmacie_de_garde', 1)
            ->select('*')
            ->get();

        return view('frontend.pharmacie', compact('pharmacies','parametres'));
    }
//*********************************************End Pharmacie*************************************** */



//*********************************************Pharmacie Togo*************************************** */
    public function pharmacie_tg($pays_id)
    {

        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
        
        $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('pharmacie_de_garde', 1)
            ->select('*')
            ->get();

        return view('frontend.tg.pharmacie', compact('pharmacies','parametres'));
    }

//*********************************************End Pharmacie Togo*************************************** */




//*********************************************Pharmacie côte d'ivoire*************************************** */
public function pharmacie_ci($pays_id)
{

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();
    
    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('pharmacie_de_garde', 1)
        ->select('*')
        ->get();

    return view('frontend.ci.pharmacie', compact('pharmacies','parametres'));
}

//*********************************************End Pharmacie côte d'ivoire*************************************** */





//*********************************************Pharmacie Niger*************************************** */
public function pharmacie_ne($pays_id)
{

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 3)
        ->select('*')
        ->get();
    
    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('pharmacie_de_garde', 1)
        ->select('*')
        ->get();

    return view('frontend.ne.pharmacie', compact('pharmacies','parametres'));
}

//*********************************************End Pharmacie Niger*************************************** */




//*********************************************Pharmacie Burkina faso*************************************** */
public function pharmacie_bf($pays_id)
{

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 4)
        ->select('*')
        ->get();
    
    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('pharmacie_de_garde', 1)
        ->select('*')
        ->get();

    return view('frontend.bf.pharmacie', compact('pharmacies','parametres'));
}

//*********************************************End Pharmacie Burkina faso*************************************** */





//*********************************************Pharmacie Bénin*************************************** */
public function pharmacie_bj($pays_id)
{

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 5)
        ->select('*')
        ->get();
    
    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('pharmacie_de_garde', 1)
        ->select('*')
        ->get();

    return view('frontend.bj.pharmacie', compact('pharmacies','parametres'));
}

//*********************************************End Pharmacie Bénin*************************************** */
}
