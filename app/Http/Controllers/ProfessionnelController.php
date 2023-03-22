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
        
        return view('frontend.professionnel',compact('parametres', 'sousCategorieNavs', 'professionels'));
    }

    public function professionnel_tg($pays_id)
    {
        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
        
        $sousCategorieNavs = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $professionels = DB::table('pays')->where('pays.id', $pays_id)
            ->join('users', 'pays.id', '=', 'users.pays_id')
            ->select('*')
            ->get();
        
        return view('frontend.tg.professionnel',compact('parametres', 'sousCategorieNavs', 'professionels'));
    }
}
