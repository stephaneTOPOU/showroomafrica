<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Parametre;
use App\Models\Slider1;
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
            ->select('*', 'categories.pays_id as pays')
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
            ->select('*', 'categories.pays_id as pays')
            ->where('vue', '>=', 500)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $slider = SliderRecherche::all();

        $search = Slider1::inRandomOrder()->first();

        $parametres = Parametre::find(1);
        
        return view('frontend.entreprise', compact('entreprises', 'sousCategorieNavs', 'sousCategories', 'entreprisePopulaire',
    'entreprisePopulaire', 'slider', 'parametres', 'search'));
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

        $tops = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherche_laterals', 'pays.id', '=', 'slider_recherche_laterals.pays_id')
            ->select('*')
            ->get();
    
        $top2s = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherche_lateral_bas', 'pays.id', '=', 'slider_recherche_lateral_bas.pays_id')
            ->inRandomOrder()
            ->first();

        $search = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
            ->inRandomOrder()
            ->first();

        return view('frontend.tg.entreprise', compact('entreprises', 'sousCategorieNavs', 'sousCategories', 'entreprisePopulaire',
    'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
    }

    //**********************************************End Entreprise Togo********************************************************* */



    //**********************************************Entreprise côte d'ivoire********************************************************* */
    public function entreprise_ci($pays_id, $sousCategorie_id)
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
            ->where('parametres.id', 2)
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

        $tops = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherche_laterals', 'pays.id', '=', 'slider_recherche_laterals.pays_id')
            ->select('*')
            ->get();
    
        $top2s = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherche_lateral_bas', 'pays.id', '=', 'slider_recherche_lateral_bas.pays_id')
            ->inRandomOrder()
            ->first();

        $search = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
            ->inRandomOrder()
            ->first();

        return view('frontend.ci.entreprise', compact('entreprises', 'sousCategorieNavs', 'sousCategories', 'entreprisePopulaire',
    'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
    }

    //**********************************************End Entreprise côte d'ivoire********************************************************* */




    
    //**********************************************Entreprise Niger********************************************************* */
    public function entreprise_ne($pays_id, $sousCategorie_id)
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
            ->where('parametres.id', 3)
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

        $tops = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherche_laterals', 'pays.id', '=', 'slider_recherche_laterals.pays_id')
            ->select('*')
            ->get();
    
        $top2s = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherche_lateral_bas', 'pays.id', '=', 'slider_recherche_lateral_bas.pays_id')
            ->inRandomOrder()
            ->first();

        $search = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
            ->inRandomOrder()
            ->first();

        return view('frontend.ne.entreprise', compact('entreprises', 'sousCategorieNavs', 'sousCategories', 'entreprisePopulaire',
    'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
    }

    //**********************************************End Entreprise Niger********************************************************* */




    //**********************************************Entreprise Burkina faso********************************************************* */
    public function entreprise_bf($pays_id, $sousCategorie_id)
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
            ->where('parametres.id', 4)
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

        $tops = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherche_laterals', 'pays.id', '=', 'slider_recherche_laterals.pays_id')
            ->select('*')
            ->get();
    
        $top2s = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherche_lateral_bas', 'pays.id', '=', 'slider_recherche_lateral_bas.pays_id')
            ->inRandomOrder()
            ->first();

        $search = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
            ->inRandomOrder()
            ->first();

        return view('frontend.bf.entreprise', compact('entreprises', 'sousCategorieNavs', 'sousCategories', 'entreprisePopulaire',
    'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
    }

    //**********************************************End Entreprise Burkina faso********************************************************* */







    //**********************************************Entreprise Bénin********************************************************* */
    public function entreprise_bj($pays_id, $sousCategorie_id)
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
            ->where('parametres.id', 5)
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

        $tops = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherche_laterals', 'pays.id', '=', 'slider_recherche_laterals.pays_id')
            ->select('*')
            ->get();
    
        $top2s = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherche_lateral_bas', 'pays.id', '=', 'slider_recherche_lateral_bas.pays_id')
            ->inRandomOrder()
            ->first();

        $search = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
            ->inRandomOrder()
            ->first();

        return view('frontend.bj.entreprise', compact('entreprises', 'sousCategorieNavs', 'sousCategories', 'entreprisePopulaire',
    'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
    }

    //**********************************************End Entreprise Bénin********************************************************* */
}
