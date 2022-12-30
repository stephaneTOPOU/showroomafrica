<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileEntrepriseController extends Controller
{
    public function ProfileEntreprise($entreprise_id)
    {
        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $parametres = Parametre::find(1);

        $Profil_entreprises = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('sous_categories', 'sous_categories.id', '=', 'souscategorie_id')
            ->select('*', 'entreprises.id')
            ->get();

        $avis = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
            ->select('note')
            ->sum('note');

        $avis3 = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
            ->select('note')
            ->get();

        $entreprise = Entreprise::find($entreprise_id);
        $entreprise->increment('vue');
        $entreprise->save();
        
        return view('frontend.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises',
    'avis3', 'avis'));
    }
}
