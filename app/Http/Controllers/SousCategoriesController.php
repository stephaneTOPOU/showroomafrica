<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use App\Models\SliderRecherche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SousCategoriesController extends Controller
{
    public function Souscategories($categorie_id)
    {
        $parametres = Parametre::find(1);

        $souscategories = DB::table('sous_categories')->where('sous_categories.categorie_id', $categorie_id)
            ->select('*')
            ->get();
        
        $categories = DB::table('categories')->where('categories.id', $categorie_id)
            ->join('sous_categories', 'sous_categories.categorie_id', 'categories.id')
            ->select('categories.libelle as nom')
            ->take(1)
            ->get();

        $slider = SliderRecherche::all();

        return view('frontend.sous-categories', compact('parametres', 'souscategories', 'slider', 'categories'));
    }




//***********************************************Categorie Togo********************************************** */
    public function Souscategories_tg($pays_id, $categorie_id)
    {
        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();

        $categories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id)
            ->join('sous_categories', 'sous_categories.categorie_id', 'categories.id')
            ->select('categories.libelle as nom')
            ->take(1)
            ->get();                        

        $souscategories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('sous_categories.libelle as nom', 'sous_categories.id as identifiant')
            ->get();

        $slider = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherches', 'pays.id', '=', 'slider_recherches.pays_id')
            ->select('*')
            ->get();

        return view('frontend.tg.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
    }

//***********************************************End Categorie Togo********************************************** */



//***********************************************Categorie côte d'ivoire********************************************** */
public function Souscategories_ci($pays_id, $categorie_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 2)
            ->select('*')
            ->get();

        $categories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id)
            ->join('sous_categories', 'sous_categories.categorie_id', 'categories.id')
            ->select('categories.libelle as nom')
            ->take(1)
            ->get();                        

        $souscategories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('sous_categories.libelle as nom', 'sous_categories.id as identifiant')
            ->get();

        $slider = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherches', 'pays.id', '=', 'slider_recherches.pays_id')
            ->select('*')
            ->get();

        return view('frontend.ci.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
}

//***********************************************End Categorie côte d'ivoire********************************************** */













//***********************************************Categorie Niger********************************************** */
public function Souscategories_ne($pays_id, $categorie_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 3)
            ->select('*')
            ->get();

        $categories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id)
            ->join('sous_categories', 'sous_categories.categorie_id', 'categories.id')
            ->select('categories.libelle as nom')
            ->take(1)
            ->get();                        

        $souscategories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('sous_categories.libelle as nom', 'sous_categories.id as identifiant')
            ->get();

        $slider = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherches', 'pays.id', '=', 'slider_recherches.pays_id')
            ->select('*')
            ->get();

        return view('frontend.ne.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
}

//***********************************************End Categorie Niger********************************************** */





//***********************************************Categorie Burkina faso********************************************** */
public function Souscategories_bf($pays_id, $categorie_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 4)
            ->select('*')
            ->get();

        $categories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id)
            ->join('sous_categories', 'sous_categories.categorie_id', 'categories.id')
            ->select('categories.libelle as nom')
            ->take(1)
            ->get();                        

        $souscategories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('sous_categories.libelle as nom', 'sous_categories.id as identifiant')
            ->get();

        $slider = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherches', 'pays.id', '=', 'slider_recherches.pays_id')
            ->select('*')
            ->get();

        return view('frontend.bf.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
}

//***********************************************End Categorie Burkina faso********************************************** */
}
