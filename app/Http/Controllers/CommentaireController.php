<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Exception;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'rating' => 'required',
            'commentaire' => 'required'
        ]);
    }
    public function commentaire(Request $request, $entreprise_id)
    {
        $request->validate([
            'rating' => 'required',
            'commentaire' => 'required'
        ]);

        try {
            $commentaire = new Commentaire();
            $commentaire->entreprise_id = $entreprise_id;
            $commentaire->note = $_POST['rating'];
            $commentaire->commentaire = $_POST['commentaire'];
            $commentaire->save();
            return redirect()->back()->with('ok', 'Merci :) !!!');
        } catch (Exception $e) {
            return redirect()->back()->with('ok', $e->getMessage());
        }
    }
}
