<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessionnelController extends Controller
{
    public function professionnel()
    {
        $parametres = Parametre::find(1);

        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $professionels = User::all();

        return view('frontend.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
    }


    //*********************************************professionnel pays*************************************** */
    public function professionnel_pays($slug_pays)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();
        $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();

        $sousCategorieNavs = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $professionels = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('users', 'pays.id', '=', 'users.pays_id')
            ->select('*')
            ->get();

        if ($slug_pays == 'tg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.tg.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'bf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 4)
                ->select('*')
                ->get();
            return view('frontend.bf.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'bj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 5)
                ->select('*')
                ->get();
            return view('frontend.bj.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'ci') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 2)
                ->select('*')
                ->get();
            return view('frontend.ci.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'ne') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ne.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'cm') {
            return view('frontend.cm.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'cf') {
            return view('frontend.cf.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'dj') {
            return view('frontend.dj.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'ga') {
            return view('frontend.ga.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'gn') {
            return view('frontend.gn.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'mg') {
            return view('frontend.mg.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'ml') {
            return view('frontend.ml.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'mr') {
            return view('frontend.mr.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'cd') {
            return view('frontend.cd.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'rw') {
            return view('frontend.rw.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'sn') {
            return view('frontend.sn.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } elseif ($slug_pays == 'td') {
            return view('frontend.td.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        } else {
            return view('frontend.professionnel', compact('parametres', 'sousCategorieNavs', 'professionels'));
        }
    }

    //*********************************************End professionnel pays*************************************** */


}
