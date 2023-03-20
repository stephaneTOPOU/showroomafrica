<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacieController extends Controller
{
    public function pharmacie()
    {
        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $parametres = Parametre::find(1);
        
        $pharmacies = DB::table('entreprises')->where('est_pharmacie', 1)
            ->where('pharmacie_de_garde', 1)
            ->select('*')
            ->get();

        return view('frontend.pharmacie', compact('pharmacies','sousCategorieNavs', 'parametres'));
    }
}
