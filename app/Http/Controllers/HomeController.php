<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Annonce;
use App\Models\Entreprise;
use App\Models\MiniSpot;
use App\Models\Parametre;
use App\Models\Pays;
use App\Models\PopUp;
use App\Models\Banner;
use App\Models\Reportage;
use App\Models\Slider1;
use App\Models\Slider2;
use App\Models\Slider3;
use App\Models\SliderLateral;
use App\Models\SliderLateralBas;
use App\Models\SliderRecherche;
use App\Models\SliderRechercheLateral;
use App\Models\SousCategories;
use App\Models\Stat;
use App\Models\User;
use App\Models\Ville;
use App\Models\Vue as ModelsVue;
use CyrildeWit\EloquentViewable\View;
use CyrildeWit\EloquentViewable\Views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NumberFormatter;
use vue;

class HomeController extends Controller
{
    //*******************************************************Recherche*************************************************************************/

    //*******************************************************Pour Afrique***********************************************************************//
    public function recherche()
    {
        $nom = request()->input('nom');
        $pays = request()->input('pays');
        $ville = request()->input('ville');
        $secteur = request()->input('secteur');

        if ($nom && $pays && $ville && $secteur) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('sous_categories.libelle', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays && $ville) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('sous_categories.libelle', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays && $secteur) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('sous_categories.libelle', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $ville && $secteur) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('sous_categories.libelle', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $ville && $secteur) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('sous_categories.libelle', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $ville) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('sous_categories.libelle', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $secteur) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('sous_categories.libelle', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $ville) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $secteur) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($ville && $secteur) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('sous_categories.libelle', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($ville) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($secteur) {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } else {
            $recherches = DB::table('pays')
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('sous_categories.libelle', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        }

        $entreprisePopulaire = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')
            ->select('*')
            ->where('vue', '>=', 500)
            ->inRandomOrder()
            ->limit(8)
            ->get();

        $parametres = Parametre::find(1);

        $slider = SliderRecherche::all();

        $tops = SliderRechercheLateral::all();

        $subcat = SousCategories::all();

        $search = Slider1::inRandomOrder()->first();

        return view('frontend.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'search'));
    }
    //*******************************************************End Pour l'Afrique*******************************************************************//



    //*******************************************************Pour les pays*********************************************************************//
    public function recherche_pays($slug_pays)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();

        $nom = request()->input('nom');
        $pays = request()->input('pays');
        $ville = request()->input('ville');
        $secteur = request()->input('secteur');

        if ($nom && $pays && $ville && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays && $ville) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $ville && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $ville && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $ville) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $ville) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($ville && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($ville) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } else {
            $recherches = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->where('entreprises.valide', 1)
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        }

        $entreprisePopulaire = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('*')
            ->where('entreprises.vue', '>=', 500)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $slider = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider_recherches', 'pays.id', '=', 'slider_recherches.pays_id')
            ->select('*')
            ->get();

        $subcat = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
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
            return view('frontend.tg.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'bf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 4)
                ->select('*')
                ->get();
            return view('frontend.bf.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'bj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 5)
                ->select('*')
                ->get();
            return view('frontend.bj.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'ci') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 2)
                ->select('*')
                ->get();
            return view('frontend.ci.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'ne') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ne.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'cm') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.cm.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'cf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.cf.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'dj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.dj.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'ga') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.ga.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'gn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.gn.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'mg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.mg.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'ml') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 6)
                ->select('*')
                ->get();
            return view('frontend.ml.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'mr') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.mr.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'cd') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.cd.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'rw') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.rw.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'sn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.sn.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } elseif ($slug_pays == 'td') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.td.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'top2s', 'search'));
        } else {
            $parametres = Parametre::find(1);
            return view('frontend.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider', 'subcat', 'tops', 'search'));
        }
    }
    //*******************************************************End Pour les pays**************************************************************************

    //********************************************************End Recherche************************************************************************//




    //********************************************************Autocompletion***********************************************************************//


    //********************************************************Afrque***********************************************************************//
    public function autocompletion(Request $request)
    {
        // $data = Entreprise::select('nom as value', 'id')
        //     ->where('nom', 'LIKE', '%' . $request->get('searchfield') . '%')
        //     ->get()
        //     ->take(6);
        $data = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('entreprises.nom as value', 'entreprises.id')
            ->where('entreprises.nom', 'LIKE', '%' . $request->get('searchfield') . '%')
            ->orWhere('sous_categories.libelle', 'LIKE', '%' . $request->get('searchfield') . '%')
            ->orWhere('entreprises.telephone1', 'LIKE', '%' . $request->get('searchfield') . '%')
            ->get()
            ->take(6);
        return response()->json($data);
    }
    //********************************************************End Afrique***********************************************************************//


    //*********************************************************Pour les pays***********************************************************************//
    public function autocompletion_pays(Request $request, $slug_pays)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();

        $data = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('entreprises.nom as value', 'entreprises.id')
            ->where('entreprises.nom', 'LIKE', '%' . $request->get('searchfield') . '%')            
            ->get()
            ->take(6);
        return response()->json($data);
    }
    //*********************************************************End Pour les pays***********************************************************************//

    //**********************************************************End Autocompletion***********************************************************************//





    //***********************************************************Les index***********************************************************************//

    //***********************************************************Pour Afrique********************************************************************//
    public function index()
    {

        $geoipInfo = geoip()->getLocation($_SERVER['REMOTE_ADDR']);

        $inscrit = User::all()->count();

        $visiteur = Stat::find(1);
        $visiteur->increment('visiteur');
        $visiteur->save();

        $visiteur2 = DB::table('stats')->select('visiteur')->get();
        // $fmt = numfmt_create( 'en_EN', NumberFormatter::DECIMAL );
        // numfmt_parse($fmt, $visiteur2);

        $villes = Ville::all();

        $pays = Pays::all();

        $categories = Categories::all();

        $slider1s = Slider1::all();
        $slider2s = Slider2::all();
        $slider3s = Slider3::all();

        $sliderLaterals = SliderLateral::find(2);
        $sliderLateralBas = SliderLateralBas::find(2);

        $rejoints = DB::table('entreprises')
            ->select('*')
            ->where('est_souscrit', '=', '1')
            //->orWhere('entreprises.logo', '!=', null)
            ->orderBy('id', 'desc')
            ->get();

        $minispots = MiniSpot::all();

        $reportages = Reportage::find(1);

        $magazines = DB::table('entreprises')
            ->select('*')
            ->where('a_magazine', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $parametres = Parametre::find(1);

        $honeures = DB::table('entreprises')
            ->select('*')
            ->where('honneur', '=', '1')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $nombresEntreprise = DB::table('entreprises')->count();
        //dump($nombresEntreprise);

        $pharmacies = DB::table('entreprises')
            ->select('*')
            ->where('est_pharmacie', '=', '1')
            ->where('pharmacie_de_garde', '=', '1')
            ->get();

        $popups = PopUp::inRandomOrder()->first();

        $banner = Banner::inRandomOrder()->first();

        $annonces = DB::table('annonces')->select('*')->take(6)->orderBy('id', 'desc')->get();

        //$totalViews = Views($vue)->count();
        //dump( $visiteur);

        return view('frontend.home', compact('banner', 'annonces', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups', 'geoipInfo'));
    }
    //***********************************************************End pour l'afrique**************************************************************//

    //***********************************************************Pour les Pays******************************************************************//
    public function index_pays($slug_pays)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();

        $inscrit = User::all()->count();

        $visiteur = Stat::find(1);
        $visiteur->increment('visiteur');
        $visiteur->save();

        $visiteur2 = DB::table('stats')->select('visiteur')->get();

        $villes = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('villes', 'pays.id', '=', 'villes.pays_id')
            ->select('*')
            ->get();

        $pays = Pays::all();

        $categories = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->select('*')
            ->get();

        $slider1s = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
            ->select('*')
            ->get();

        $slider2s = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
            ->select('*')
            ->get();

        $slider3s = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
            ->select('*')
            ->get();

        $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
            ->select('*')
            ->get();

        $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
            ->select('*')
            ->get();

        $rejoints = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('*')
            ->where('entreprises.est_souscrit', '=', '1')
            ->orderBy('entreprises.id', 'desc')
            ->get();

        $minispots = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
            ->select('*')
            ->get();

        $reportages = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
            ->select('*')
            ->get();

        $magazines = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('*')
            ->where('entreprises.a_magazine', '=', '1')
            ->orderBy('entreprises.id', 'desc')
            ->get();

        $honeures = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('*')
            ->where('entreprises.honneur', '=', '1')
            ->orderBy('entreprises.id', 'desc')
            ->get();
        //dd($honeures);

        $nombresEntreprise = DB::table('entreprises')->count();
        //dump($nombresEntreprise);

        $pharmacies = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('*')
            ->where('est_pharmacie', '=', '1')
            ->where('entreprises.pharmacie_de_garde', '=', '1')
            ->get();


        $popups = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
            ->inRandomOrder()
            ->first();

        $banner = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('banners', 'pays.id', '=', 'banners.pays_id')
            ->inRandomOrder()
            ->first();

        if ($slug_pays == 'tg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.tg.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'bf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 4)
                ->select('*')
                ->get();
            return view('frontend.bf.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'bj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 5)
                ->select('*')
                ->get();
            return view('frontend.bj.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'ci') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 2)
                ->select('*')
                ->get();
            return view('frontend.ci.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'ne') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ne.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'cm') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.cm.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'cf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.cf.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'dj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.dj.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'ga') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ga.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'gn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.gn.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'mg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.mg.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'ml') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 6)
                ->select('*')
                ->get();
            return view('frontend.ml.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'mr') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.mr.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'cd') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.cd.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'rw') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.rw.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'sn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.sn.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } elseif ($slug_pays == 'td') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.td.home', compact('banner', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups'));
        } else {
            $parametres = Parametre::find(1);
            return view('frontend.home', compact('banner', 'annonces', 'slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas', 'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'honeures', 'nombresEntreprise', 'pharmacies', 'inscrit', 'visiteur2', 'popups', 'geoipInfo'));
        }
    }
    //***********************************************************End pour les pays**************************************************************/

    //**********************************************************End Les index********************************************************************//

}
