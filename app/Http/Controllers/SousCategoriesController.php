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
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.cm.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'cf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.cf.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'dj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.dj.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'ga') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.ga.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'gn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.gn.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'mg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.mg.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'ml') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 6)
                ->select('*')
                ->get();
            return view('frontend.ml.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'mr') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.mr.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'cd') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.cd.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'rw') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.rw.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'sn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.sn.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } elseif ($slug_pays == 'td') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.td.sous-categories', compact('parametres', 'categories', 'souscategories', 'slider'));
        } else {
            $parametres = Parametre::find(1);
            return view('frontend.sous-categories', compact('parametres', 'souscategories', 'slider', 'categories'));
        }
    }

    //***********************************************End SousCategorie Pays********************************************** */



}
