<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevisController extends Controller
{
    public function devis(Request $request)
    {
        //dd($request);
        $data = $request->validate([
            'nom' => 'string',
        ]);

        try {
                $data = new Devis();
                $data->souscategorie_id = $request->souscategorie_id;
                $data->type_demande = $request->type_demande;
                $data->ville = $request->ville;
                $data->email = $request->email;
                $data->nom = $request->nom;
                $data->prenom = $request->prenom;
                $data->telephone = $request->telephone;
                $data->demande = $request->demande;
                
                $data->save();
            return redirect()->back()->with('succes', 'Votre devis ajoutée avec succès. Merci :)');
        } catch (Exception $e) {
            return redirect()->back()->with('succes', $e->getMessage());
        }

    }

}
