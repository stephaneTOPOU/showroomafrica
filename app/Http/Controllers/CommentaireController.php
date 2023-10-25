<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentaireController extends Controller
{
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'rating' => 'required',
            'commentaire' => 'required'
        ]);
    }
    public function commentaire(Request $request, $slug_souscategorie, $slug_entreprise)
    {
        $sousCategorie_id = DB::table('sous_categories')->where('slug_souscategorie', $slug_souscategorie)->select('id')->get();
        $entreprise_id = DB::table('entreprises')->where('slug_entreprise', $slug_entreprise)->select('id')->get();
        
        $request->validate([
            'rating' => 'required',
            'commentaire' => 'required'
        ]);

        try {
            $commentaire = new Commentaire();
            $commentaire->entreprise_id = $entreprise_id[0]->id;
            $commentaire->note = $_POST['rating'];
            $commentaire->commentaire = $_POST['commentaire'];
            $commentaire->save();
            return redirect()->back()->with('ok', 'Merci :) !!!');
        } catch (Exception $e) {
            return redirect()->back()->with('ok', $e->getMessage());
        }
    }
}
