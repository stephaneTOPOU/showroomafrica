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
            ->select('*', 'categories.libelle as cat', 'categories.id as idCat')
            ->get();

        $souscategories = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*', 'sous_categories.libelle as subcat', 'sous_categories.categorie_id as id2', 'sous_categories.id as idSousCat', 'categories.id as id1')
            ->get();

        $slider = SliderRecherche::all();

        return view('frontend.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
    }




    //***********************************************Categorie Pays********************************************** */
    public function categories_pays($slug_pays)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();
        $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();

        $categories = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->select('*', 'categories.libelle as cat', 'categories.id as idCat')
            ->get();

        $souscategories = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*', 'sous_categories.libelle as subcat', 'sous_categories.categorie_id as id2', 'sous_categories.id as idSousCat', 'categories.id as id1')
            ->get();

        $slider = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('slider_recherches', 'pays.id', '=', 'slider_recherches.pays_id')
            ->select('*')
            ->get();

        if ($slug_pays == 'tg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.tg.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'bf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 4)
                ->select('*')
                ->get();
            return view('frontend.bf.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'bj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 5)
                ->select('*')
                ->get();
            return view('frontend.bj.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'ci') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 2)
                ->select('*')
                ->get();
            return view('frontend.ci.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'ne') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ne.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'cm') {
            return view('frontend.cm.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'cf') {
            return view('frontend.cf.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'dj') {
            return view('frontend.dj.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'ga') {
            return view('frontend.ga.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'gn') {
            return view('frontend.gn.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'mg') {
            return view('frontend.mg.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'ml') {
            return view('frontend.ml.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'mr') {
            return view('frontend.mr.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'cd') {
            return view('frontend.cd.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'rw') {
            return view('frontend.rw.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'sn') {
            return view('frontend.sn.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'td') {
            return view('frontend.td.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } else {
            return view('frontend.categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        }
    }

    //***********************************************End Categorie Pays********************************************** */


}
