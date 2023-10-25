<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use App\Models\SliderRecherche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SousCategoriesController extends Controller
{
    public function Souscategories($slug_categorie)
    {
        //dd($slug_categorie);
        $categorie_id = DB::table('categories')->where('slug_categorie', $slug_categorie)->select('id')->get();

        $parametres = Parametre::find(1);

        $souscategories = DB::table('categories')->where('categories.id', $categorie_id[0]->id)
            ->join('sous_categories', 'sous_categories.categorie_id', 'categories.id')
            ->select('*')
            ->get();

        $categories = DB::table('categories')->where('categories.id', $categorie_id[0]->id)
            ->join('sous_categories', 'sous_categories.categorie_id', 'categories.id')
            ->select('*', 'categories.libelle as nom')
            ->take(1)
            ->get();

        $slider = SliderRecherche::all();

        return view('frontend.sous-categories', compact('parametres', 'souscategories', 'slider', 'categories'));
    }




    //***********************************************SousCategorie Pays********************************************** */
    public function Souscategories_pays($slug_pays, $slug_categorie)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();
        $categorie_id = DB::table('categories')->where('slug_categorie', $slug_categorie)->select('id')->get();

        $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();

        $categories = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id[0]->id)
            ->join('sous_categories', 'sous_categories.categorie_id', 'categories.id')
            ->select('categories.libelle as nom')
            ->take(1)
            ->get();

        $souscategories = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')->where('categories.id', $categorie_id[0]->id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*', 'sous_categories.libelle as nom', 'sous_categories.id as identifiant')
            ->get();
        // dd($souscategories);

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
            return view('frontend.tg.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'bf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 4)
                ->select('*')
                ->get();
            return view('frontend.bf.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'bj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 5)
                ->select('*')
                ->get();
            return view('frontend.bj.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'ci') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 2)
                ->select('*')
                ->get();
            return view('frontend.ci.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'ne') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ne.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'cm') {
            return view('frontend.cm.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'cf') {
            return view('frontend.cf.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'dj') {
            return view('frontend.dj.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'ga') {
            return view('frontend.ga.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'gn') {
            return view('frontend.gn.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'mg') {
            return view('frontend.mg.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'ml') {
            return view('frontend.ml.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'mr') {
            return view('frontend.mr.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'cd') {
            return view('frontend.cd.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'rw') {
            return view('frontend.rw.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'sn') {
            return view('frontend.sn.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'td') {
            return view('frontend.td.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } else {
            return view('frontend.sous-categories', compact('parametres', 'souscategories', 'slider', 'categories'));
        }
    }

    //***********************************************End SousCategorie Pays********************************************** */



}
