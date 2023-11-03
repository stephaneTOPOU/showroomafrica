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
    public function entreprise($slug_categorie, $slug_souscategorie)
    {
        $categorie_id = DB::table('categories')->where('slug_categorie', $slug_categorie)->select('id')->get();
        $sousCategorie_id = DB::table('sous_categories')->where('slug_souscategorie', $slug_souscategorie)->select('id')->get();

        $entreprises = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id[0]->id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->where('sous_categories.id', $sousCategorie_id[0]->id)
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')
            ->select('*', 'categories.pays_id as pays')
            ->orderBy('entreprises.id', 'desc')
            ->paginate(100);

        $sousCategories = DB::table('categories')->where('categories.id', $categorie_id[0]->id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->where('sous_categories.id', $sousCategorie_id[0]->id)
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')
            ->select('*', 'sous_categories.libelle', 'sous_categories.id as identifiant')
            ->limit(1)
            ->get();

        $entreprisePopulaire = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')
            ->select('*')
            ->where('vue', '>=', 500)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $slider = SliderRecherche::all();

        $search = Slider1::inRandomOrder()->first();

        $parametres = Parametre::find(1);

        return view('frontend.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'search'));
    }
    //**********************************************End Entreprise********************************************************* */



    //**********************************************Entreprise Pays********************************************************* */
    public function entreprise_pays($slug_pays, $slug_categorie, $slug_souscategorie)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();
        $categorie_id = DB::table('categories')->where('slug_categorie', $slug_categorie)->select('id')->get();
        $sousCategorie_id = DB::table('sous_categories')->where('slug_souscategorie', $slug_souscategorie)->select('id')->get();

        $entreprises = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id[0]->id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')->where('sous_categories.id', $sousCategorie_id[0]->id)
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('*')
            ->orderBy('entreprises.id', 'desc')
            ->paginate(100);

        $sousCategories = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id[0]->id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')->where('sous_categories.id', $sousCategorie_id[0]->id)
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('sous_categories.libelle', 'sous_categories.id as identifiant')
            ->limit(1)
            ->get();

        $entreprisePopulaire = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id[0]->id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')->where('sous_categories.id', $sousCategorie_id[0]->id)
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('*')
            ->where('vue', '>=', 500)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $slider = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider_recherches', 'pays.id', '=', 'slider_recherches.pays_id')
            ->select('*')
            ->get();

        $tops = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider_recherche_laterals', 'pays.id', '=', 'slider_recherche_laterals.pays_id')
            ->select('*')
            ->get();

        $top2s = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider_recherche_lateral_bas', 'pays.id', '=', 'slider_recherche_lateral_bas.pays_id')
            ->inRandomOrder()
            ->first();

        $search = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
            ->inRandomOrder()
            ->first();

        if ($slug_pays == 'tg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.tg.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'bf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 4)
                ->select('*')
                ->get();
            return view('frontend.bf.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'bj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 5)
                ->select('*')
                ->get();
            return view('frontend.bj.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'ci') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 2)
                ->select('*')
                ->get();
            return view('frontend.ci.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'ne') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ne.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'cm') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.cm.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'cf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.cf.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'dj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.dj.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'ga') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.ga.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'gn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.gn.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'mg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.mg.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'ml') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 6)
                ->select('*')
                ->get();
            return view('frontend.ml.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'mr') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.mr.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'cd') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.cd.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'rw') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.rw.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'sn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.sn.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'td') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.td.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'tops', 'top2s', 'search'));
        } else {
            $parametres = Parametre::find(1);
            return view('frontend.entreprise', compact('entreprises', 'sousCategories', 'entreprisePopulaire', 'entreprisePopulaire', 'slider', 'parametres', 'search'));
        }
    }

    //**********************************************End Entreprise Pays********************************************************* */
}
