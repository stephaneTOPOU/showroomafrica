<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    //**********************************************************site web ************************************* */
    public function siteweb()
    {
        $parametres = Parametre::find(1);

        return view('frontend.siteweb', compact('parametres'));
    }


    //**********************************************************site web  Pays************************************* */
    public function siteweb_pays($slug_pays)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();

        if ($slug_pays == 'tg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.tg.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'bf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 4)
                ->select('*')
                ->get();
            return view('frontend.bf.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'bj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 5)
                ->select('*')
                ->get();
            return view('frontend.bj.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'ci') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 2)
                ->select('*')
                ->get();
            return view('frontend.ci.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'ne') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ne.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'cm') {
            return view('frontend.cm.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'cf') {
            return view('frontend.cf.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'dj') {
            return view('frontend.dj.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'ga') {
            return view('frontend.ga.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'gn') {
            return view('frontend.gn.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'mg') {
            return view('frontend.mg.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'ml') {
            return view('frontend.ml.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'mr') {
            return view('frontend.mr.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'cd') {
            return view('frontend.cd.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'rw') {
            return view('frontend.rw.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'sn') {
            return view('frontend.sn.siteweb', compact('parametres'));
        } elseif ($slug_pays == 'td') {
            return view('frontend.td.siteweb', compact('parametres'));
        } else {
            return view('frontend.siteweb', compact('parametres'));
        }
    }

    //**********************************************************End site web Pays************************************* */



    //**********************************************************End site web ************************************* */
}
