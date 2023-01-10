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
    

    public function entreprise($sousCategorie_id)
    {
        $entreprises = DB::table('sous_categories')->where('sous_categories.id', $sousCategorie_id)
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')
            ->select('*')
            ->orderBy('entreprises.id', 'desc')
            ->paginate(100);

            $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $sousCategories = DB::table('sous_categories')->where('sous_categories.id', $sousCategorie_id)
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')
            ->select('sous_categories.libelle')
            ->limit(1)
            ->get();

        $entreprisePopulaire = Entreprise::inRandomOrder()->limit(4)->get();

        $slider = SliderEntreprise::all();

        $parametres = Parametre::find(1);
        return view('frontend.entreprise', compact('entreprises', 'sousCategorieNavs', 'sousCategories', 'entreprisePopulaire',
    'entreprisePopulaire', 'slider', 'parametres'));
    }
}
