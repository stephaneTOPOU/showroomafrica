<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function entreprise()
    {
        $parametres = Parametre::find(1);
        
        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();
            
        return view('frontend.entreprise.enregistrer', compact('parametres', 'sousCategorieNavs'));
    }
}
