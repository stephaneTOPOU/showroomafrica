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
    //*************************Recherche****************************/
    public function recherche()
    {
        $nom = request()->input('nom');
        $pays = request()->input('pays');
        $ville = request()->input('ville');
        $secteur = request()->input('secteur');

        if ($nom && $pays && $ville && $secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays && $ville) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays && $secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $ville && $secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $ville && $secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.pays', 'LIKE', "%$pays%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $ville) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $ville) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($ville && $secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($ville) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } else {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        }

        $entreprisePopulaire = DB::table('entreprises')
            ->select('*')
            ->where('entreprises.vue', '>', '500')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $parametres = Parametre::find(1);

        $slider = SliderRecherche::all();

        return view('frontend.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider'));
    }

    //*************Pour le togo*******************
    public function recherche_tg($pays_id)
    {
        $nom = request()->input('nom');
        $pays = request()->input('pays');
        $ville = request()->input('ville');
        $secteur = request()->input('secteur');

        if ($nom && $pays && $ville && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays && $ville) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $ville && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $ville && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $pays) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.pays', 'LIKE', "%$pays%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $ville) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $ville) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($ville && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($nom) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($pays) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($ville) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } elseif ($secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        } else {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.nom', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone1', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone2', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone3', 'LIKE', "%$nom%")
                ->orWhere('entreprises.telephone4', 'LIKE', "%$nom%")
                ->orWhere('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.est_souscrit', 'desc')
                ->get();
        }

        $entreprisePopulaire = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('*')
            ->where('entreprises.vue', '>', '100')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();

        $slider = SliderRecherche::all();

        return view('frontend.tg.recherche-entreprise', compact('recherches', 'entreprisePopulaire', 'parametres', 'slider'));
    }
    //*********************************End Recherche*********************************************//

    //*********************************Autocompletion*********************************************//
    public function autocompletion(Request $request)
    {
        $data = Entreprise::select('nom as value', 'id')
            ->where('nom', 'LIKE', '%' . $request->get('searchfield') . '%')
            ->get()
            ->take(6);
        return response()->json($data);
    }

    //*********************************Pour le togo***********************************************//
    public function autocompletion_tg(Request $request, $pays_id)
    {
        $data = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('entreprises.nom as value', 'entreprises.id')
            ->where('entreprises.nom', 'LIKE', '%' . $request->get('searchfield') . '%')
            ->get()
            ->take(6);
        return response()->json($data);
    }
    //***********************************End Autocompletion***************************************//





    //***************************************Les index*******************************************//
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

        $sliderLaterals = SliderLateral::all();
        $sliderLateralBas = SliderLateralBas::all();

        $rejoints = DB::table('entreprises')
            ->select('*')
            ->where('est_souscrit', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $minispots = MiniSpot::all();

        $reportages = Reportage::all();

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

        $annonces = Annonce::take(6)->orderBy('id', 'desc')->get();

        //$totalViews = Views($vue)->count();
        //dump( $visiteur);

        return view('frontend.home', compact(
            'banner',
            'annonces',
            'slider1s',
            'slider2s',
            'slider3s',
            'sliderLaterals',
            'sliderLateralBas',
            'rejoints',
            'minispots',
            'reportages',
            'magazines',
            'parametres',
            'villes',
            'pays',
            'categories',
            'honeures',
            'nombresEntreprise',
            'pharmacies',
            'inscrit',
            'visiteur2',
            'popups',
            'geoipInfo'
        ));
    }

    //**************************************Pour le Togo************************************************/
    public function index_tg($pays_id)
        {
            
            $inscrit = User::all()->count();
            
            $visiteur = Stat::find(1);
            $visiteur->increment('visiteur');
            $visiteur->save();
            
            $visiteur2 = DB::table('stats')->select('visiteur')->get();
    
            $villes = DB::table('pays')->where('pays.id', $pays_id)
                ->join('villes', 'pays.id', '=', 'villes.pays_id')
                ->select('*')
                ->get();
    
            $pays = Pays::all();
    
            $categories = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->select('*')
                ->get();
    
            $slider1s = DB::table('pays')->where('pays.id', $pays_id)
                ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
                ->select('*')
                ->get();

            $slider2s = DB::table('pays')->where('pays.id', $pays_id)
                ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
                ->select('*')
                ->get();

            $slider3s = DB::table('pays')->where('pays.id', $pays_id)
                ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
                ->select('*')
                ->get();
    
            $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
                ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
                ->select('*')
                ->get();

            $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
                ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
                ->select('*')
                ->get();
    
            $rejoints = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->select('*')
                ->where('entreprises.est_souscrit', '=', '1')
                ->orderBy('entreprises.id', 'desc')
                ->get();
    
            $minispots = DB::table('pays')->where('pays.id', $pays_id)
                ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
                ->select('*')
                ->get();
    
            $reportages = DB::table('pays')->where('pays.id', $pays_id)
                ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
                ->select('*')
                ->get();
    
            $magazines = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->select('*')
                ->where('entreprises.a_magazine', '=', '1')
                ->orderBy('entreprises.id', 'desc')
                ->get();
    
            $parametres = DB::table('pays')->where('pays.id', $pays_id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
    
            $honeures = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->select('*')
                ->where('entreprises.honneur', '=', '1')
                ->orderBy('entreprises.id', 'desc')
                ->take(3)
                ->get();
    
            $nombresEntreprise = DB::table('entreprises')->count();
            //dump($nombresEntreprise);
    
            $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->select('*')
                ->where('est_pharmacie', '=', '1')
                ->where('entreprises.pharmacie_de_garde', '=', '1')
                ->get();
    

            $popups = DB::table('pays')->where('pays.id', $pays_id)
                ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
                ->inRandomOrder()
                ->first();

            $banner = DB::table('pays')->where('pays.id', $pays_id)
                ->join('banners', 'pays.id', '=', 'banners.pays_id')
                ->inRandomOrder()
                ->first();
    
            //$totalViews = Views($vue)->count();
            //dump( $visiteur);
    
            return view('frontend.tg.home', compact(
                'banner',
                'slider1s',
                'slider2s',
                'slider3s',
                'sliderLaterals',
                'sliderLateralBas',
                'rejoints',
                'minispots',
                'reportages',
                'magazines',
                'parametres',
                'villes',
                'pays',
                'categories',
                'honeures',
                'nombresEntreprise',
                'pharmacies',
                'inscrit',
                'visiteur2',
                'popups'
            ));
        }

        //*****************************************End Togo*************************************************/


//**************************************Pour le Bienin************************************************/
public function index_bj($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.bj.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Benin*************************************************/


//**************************************Pour le Burkina faso************************************************/
public function index_bf($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.bf.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Burkina Faso*************************************************/


//**************************************Pour le Burundi************************************************/
public function index_bi($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.bi.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Burundi*************************************************/



//**************************************Pour le Cameroun************************************************/
public function index_cm($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.cm.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Cameroun*************************************************/



//**************************************Pour le Centrafrique************************************************/
public function index_cf($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.cf.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Centrafique*************************************************/



//**************************************Pour le Congo-Brazza************************************************/
public function index_cg($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.cg.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Congo-Brazza*************************************************/


//**************************************Pour la Côte d'ivoire************************************************/
public function index_ci($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.ci.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Côte d'ivoire*************************************************/




//**************************************Pour le Djibouti************************************************/
public function index_dj($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.dj.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Djibouti*************************************************/



//**************************************Pour le Gabon************************************************/
public function index_ga($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.ga.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Gabon*************************************************/



//**************************************Pour le Guinée-co************************************************/
public function index_gn($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.gn.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Guinée-co*************************************************/



//**************************************Pour le Madagascar************************************************/
public function index_mg($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.mg.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Madagascar*************************************************/



//**************************************Pour le Mali************************************************/
public function index_ml($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.ml.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Mali*************************************************/



//**************************************Pour la Mauritanie************************************************/
public function index_mr($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.mr.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Mauritanie*************************************************/




//**************************************Pour le Niger************************************************/
public function index_ne($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.ne.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Niger*************************************************/




//**************************************Pour la RDC************************************************/
public function index_cd($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.cd.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End RDC*************************************************/



//**************************************Pour le Rwanda************************************************/
public function index_rw($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.rw.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Rwanda*************************************************/



//**************************************Pour le Sénégal************************************************/
public function index_sn($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.sn.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Sénégal*************************************************/



//**************************************Pour le Tchad************************************************/
public function index_td($pays_id)
{
    
    $inscrit = User::all()->count();
    
    $visiteur = Stat::find(1);
    $visiteur->increment('visiteur');
    $visiteur->save();
    
    $visiteur2 = DB::table('stats')->select('visiteur')->get();

    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $pays = Pays::all();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*')
        ->get();

    $slider1s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider1s', 'pays.id', '=', 'slider1s.pays_id')
        ->select('*')
        ->get();

    $slider2s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider2s', 'pays.id', '=', 'slider2s.pays_id')
        ->select('*')
        ->get();

    $slider3s = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider3s', 'pays.id', '=', 'slider3s.pays_id')
        ->select('*')
        ->get();

    $sliderLaterals = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_laterals', 'pays.id', '=', 'slider_laterals.pays_id')
        ->select('*')
        ->get();

    $sliderLateralBas = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->select('*')
        ->get();

    $rejoints = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.est_souscrit', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $minispots = DB::table('pays')->where('pays.id', $pays_id)
        ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
        ->select('*')
        ->get();

    $reportages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
        ->select('*')
        ->get();

    $magazines = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.a_magazine', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->get();

    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $honeures = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('entreprises.honneur', '=', '1')
        ->orderBy('entreprises.id', 'desc')
        ->take(3)
        ->get();

    $nombresEntreprise = DB::table('entreprises')->count();
    //dump($nombresEntreprise);

    $pharmacies = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->select('*')
        ->where('est_pharmacie', '=', '1')
        ->where('entreprises.pharmacie_de_garde', '=', '1')
        ->get();

    $popups = DB::table('pays')->where('pays.id', $pays_id)
        ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
        ->select('*')
        ->get();

    //$totalViews = Views($vue)->count();
    //dump( $visiteur);

    return view('frontend.td.home', compact(
        'slider1s',
        'slider2s',
        'slider3s',
        'sliderLaterals',
        'sliderLateralBas',
        'rejoints',
        'minispots',
        'reportages',
        'magazines',
        'parametres',
        'villes',
        'pays',
        'categories',
        'honeures',
        'nombresEntreprise',
        'pharmacies',
        'inscrit',
        'visiteur2',
        'popups'
    ));
}

//*****************************************End Tchad*************************************************/
}
