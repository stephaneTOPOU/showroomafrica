<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacieController extends Controller
{
    //*********************************************Pharmacie*************************************** */
    public function pharmacie()
    {

        $parametres = Parametre::find(1);

        $pharmacies = DB::table('entreprises')->where('est_pharmacie', 1)
            ->where('pharmacie_de_garde', 1)
            ->select('*')
            ->get();

        return view('frontend.pharmacie', compact('pharmacies', 'parametres'));
    }
    //*********************************************End Pharmacie*************************************** */



    //*********************************************Pharmacie Pays*************************************** */
    public function pharmacie_pays($slug_pays)
    {

        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();
        $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();

        $pharmacies = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('pharmacie_de_garde', 1)
            ->select('*')
            ->get();

        if ($slug_pays == 'tg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
                return view('frontend.tg.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'bf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 4)
                ->select('*')
                ->get();
            return view('frontend.bf.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'bj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 5)
                ->select('*')
                ->get();
            return view('frontend.bj.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'ci') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 2)
                ->select('*')
                ->get();
            return view('frontend.ci.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'ne') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ne.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'cm') {
            return view('frontend.cm.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'cf') {
            return view('frontend.cf.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'dj') {
            return view('frontend.dj.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'ga') {
            return view('frontend.ga.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'gn') {
            return view('frontend.gn.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'mg') {
            return view('frontend.mg.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'ml') {
            return view('frontend.ml.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'mr') {
            return view('frontend.mr.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'cd') {
            return view('frontend.cd.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'rw') {
            return view('frontend.rw.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'sn') {
            return view('frontend.sn.pharmacie', compact('pharmacies','parametres'));
        } elseif ($slug_pays == 'td') {
            return view('frontend.td.pharmacie', compact('pharmacies','parametres'));
        } else {
            return view('frontend.pharmacie', compact('pharmacies', 'parametres'));
        }
    }

    //*********************************************End Pharmacie Pays*************************************** */

}
