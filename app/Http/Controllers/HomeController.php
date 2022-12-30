<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Entreprise;
use App\Models\MiniSpot;
use App\Models\Parametre;
use App\Models\Pays;
use App\Models\Reportage;
use App\Models\Slider1;
use App\Models\Slider2;
use App\Models\Slider3;
use App\Models\SliderLateral;
use App\Models\SliderLateralBas;
use App\Models\SliderRecherche;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
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
    public function index()
    {
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

        return view('frontend.home', compact('slider1s', 'slider2s', 'slider3s', 'sliderLaterals', 'sliderLateralBas',
        'rejoints', 'minispots', 'reportages', 'magazines', 'parametres', 'villes', 'pays', 'categories', 'sousCategorieNavs',
        'honeures'));
    }
}
