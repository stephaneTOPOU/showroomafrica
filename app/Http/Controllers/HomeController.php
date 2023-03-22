<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Entreprise;
use App\Models\MiniSpot;
use App\Models\Parametre;
use App\Models\Pays;
use App\Models\PopUp;
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($pays && $ville && $secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($pays && $ville) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($pays && $secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($ville && $secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($pays) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($ville) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($secteur) {
            $recherches = DB::table('categories')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
                ->get();
        }

        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $entreprisePopulaire = Entreprise::inRandomOrder()->limit(4)->get();

        $parametres = Parametre::find(1);

        $slider = SliderRecherche::all();

        return view('frontend.recherche-entreprise', compact('recherches', 'sousCategorieNavs', 'entreprisePopulaire', 'parametres', 'slider'));
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($pays && $ville) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($pays && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($ville && $secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->orWhere('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($pays) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.pays', 'LIKE', "%$pays%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($ville) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('entreprises.ville', 'LIKE', "%$ville%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
                ->get();
        } elseif ($secteur) {
            $recherches = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
                ->where('categories.libelle', 'LIKE', "%$secteur%")
                ->select('*', 'sous_categories.libelle as sousCategorie', 'entreprises.id')
                ->orderBy('entreprises.id', 'desc')
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
                ->orderBy('entreprises.id', 'desc')
                ->get();
        }

        $sousCategorieNavs = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $entreprisePopulaire = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->select('*')
            ->where('entreprises.vue', '>', '100')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $parametres = Parametre::find(1);

        $slider = SliderRecherche::all();

        return view('frontend.tg.recherche-entreprise', compact('recherches', 'sousCategorieNavs', 'entreprisePopulaire', 'parametres', 'slider'));
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

        $inscrit = User::all()->count();

        $visiteur = Stat::find(1);
        $visiteur->increment('visiteur');
        $visiteur->save();

        $visiteur2 = DB::table('stats')->select('visiteur')->get();
        // $fmt = numfmt_create( 'en_EN', NumberFormatter::DECIMAL );
        // numfmt_parse($fmt, $visiteur2);

        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

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

        $popups = PopUp::all();

        //$totalViews = Views($vue)->count();
        //dump( $visiteur);

        return view('frontend.home', compact(
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
            'sousCategorieNavs',
            'honeures',
            'nombresEntreprise',
            'pharmacies',
            'inscrit',
            'visiteur2',
            'popups'
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
            
            $sousCategorieNavs = DB::table('pays')->where('pays.id', $pays_id)
                ->join('categories', 'pays.id', '=', 'categories.pays_id')
                ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
                ->select('*')
                ->take(4)
                ->get();
    
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
                ->select('*')
                ->get();
    
            //$totalViews = Views($vue)->count();
            //dump( $visiteur);
    
            return view('frontend.tg.home', compact(
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
                'sousCategorieNavs',
                'honeures',
                'nombresEntreprise',
                'pharmacies',
                'inscrit',
                'visiteur2',
                'popups'
            ));
        }

        //*****************************************End Index*************************************************/
}
