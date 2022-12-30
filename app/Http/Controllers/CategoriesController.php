<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use App\Models\SliderCategorie;
use App\Models\SliderRecherche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function categories()
    {
        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $parametres = Parametre::find(1);

        $categories = DB::table('categories')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->select('*','categories.libelle as cat', 'sous_categories.libelle as subcat')
        ->get();

        $souscategories = DB::table('categories')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->select('*','categories.libelle as cat', 'sous_categories.libelle as subcat')
        ->take(8)
        ->get();

        $slider = SliderCategorie::all();

        return view('frontend.categories', compact('sousCategorieNavs', 'parametres', 'categories', 'souscategories', 'slider'));
    }
}
