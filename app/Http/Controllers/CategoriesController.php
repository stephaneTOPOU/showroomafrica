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
        $parametres = Parametre::find(1);

        $categories = DB::table('categories')
            ->select('*','categories.libelle as cat','categories.id as idCat')
            ->get();

        $souscategories = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*', 'sous_categories.libelle as subcat', 'sous_categories.categorie_id as id2', 'sous_categories.id as idSousCat', 'categories.id as id1')
            ->get();

        $slider = SliderRecherche::all();

        return view('frontend.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
    }




//***********************************************Categorie Togo********************************************** */
    public function categories_tg($pays_id)
    {
        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();

        $categories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->select('*','categories.libelle as cat', 'categories.id as idCat')
            ->get();                        

        $souscategories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*', 'sous_categories.libelle as subcat', 'sous_categories.categorie_id as id2', 'sous_categories.id as idSousCat', 'categories.id as id1')
            ->get();

        $slider = DB::table('pays')->where('pays.id', $pays_id)
            ->join('slider_recherches', 'pays.id', '=', 'slider_recherches.pays_id')
            ->select('*')
            ->get();

        return view('frontend.tg.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
    }

//***********************************************End Categorie Togo********************************************** */



//***********************************************Categorie côte d'ivoire********************************************** */
public function categories_ci($pays_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $categories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->select('*','categories.libelle as cat', 'categories.id as idCat')
        ->get();                        

    $souscategories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->select('*', 'sous_categories.libelle as subcat', 'sous_categories.categorie_id as id2', 'sous_categories.id as idSousCat', 'categories.id as id1')
        ->get();

    $slider = DB::table('pays')->where('pays.id', $pays_id)
        ->join('slider_recherches', 'pays.id', '=', 'slider_recherches.pays_id')
        ->select('*')
        ->get();

    return view('frontend.ci.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
}

//***********************************************End Categorie côte d'ivoire********************************************** */
}
