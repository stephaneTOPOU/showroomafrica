<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavbarController extends Controller
{
    public function navBar()
    {
        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();
            
        $parametres = Parametre::find(1);
        return view('frontend.navbar', compact('sousCategorieNavs', 'parametres'));
    }
}
