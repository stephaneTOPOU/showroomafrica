<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Parametre;
use App\Models\SliderEntreprise;
use App\Models\SliderRecherche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntrepriseController extends Controller
{
    
//**********************************************Entreprise********************************************************* */
    public function entreprise($sousCategorie_id)
    {
        $entreprises = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')->where('sous_categories.id', $sousCategorie_id)
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')
            ->select('*', 'categories.pays_id as code')
            ->orderBy('entreprises.id', 'desc')
            ->paginate(100);

            $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $sousCategories = DB::table('sous_categories')->where('sous_categories.id', $sousCategorie_id)
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')
            ->select('sous_categories.libelle', 'sous_categories.id as identifiant')
            ->limit(1)
            ->get();

        $entreprisePopulaire = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')
            ->select('*', 'categories.pays_id as code')
            ->where('vue', '>=', 500)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $slider = SliderRecherche::all();

        $parametres = Parametre::find(1);
        return view('frontend.entreprise', compact('entreprises', 'sousCategorieNavs', 'sousCategories', 'entreprisePopulaire',
    'entreprisePopulaire', 'slider', 'parametres'));
    }
//**********************************************End Entreprise********************************************************* */



//**********************************************Entreprise Togo********************************************************* */
    public function entreprise_tg($pays_id, $sousCategorie_id)
    {
        $entreprises = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('sous_categories.id', $sousCategorie_id)
            ->select('*')
            ->orderBy('entreprises.id', 'desc')
            ->paginate(100);

        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
        
        $sousCategorieNavs = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $sousCategories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->where('sous_categories.id', $sousCategorie_id)
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('sous_categories.libelle', 'sous_categories.id as identifiant')
            ->limit(1)
            ->get();

        $entreprisePopulaire = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('*')
            ->where('vue', '>=', 500)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $slider = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherches', 'pays.id', '=', 'slider_recherches.pays_id')
            ->select('*')
            ->get();

        return view('frontend.tg.entreprise', compact('entreprises', 'sousCategorieNavs', 'sousCategories', 'entreprisePopulaire',
    'entreprisePopulaire', 'slider', 'parametres'));
    }

    //**********************************************End Entreprise Togo********************************************************* */
}
