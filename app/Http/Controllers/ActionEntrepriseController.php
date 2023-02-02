<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Exception;
use Illuminate\Http\Request;

class ActionEntrepriseController extends Controller
{
    public function addEntreprise(Request $request)
    {
        $data = $request->validate([
            'nom' => 'string',
            'adresse' => 'string',
            'telephone1' => 'string',
            'pays' => 'string',
            'ville' => 'string',
            'souscategorie_id' => 'integer',
            'logo' => 'nullable|file|max:1024',
        ]);

        try {
            if ($request->logo == null) {
                $data = new Entreprise();
                $data->souscategorie_id = $request->souscategorie_id;
                $data->nom = $request->nom;
                $data->email = $request->email;
                $data->adresse = $request->adresse;
                $data->telephone1 = $request->telephone1;
                $data->telephone2 = $request->telephone2;
                $data->telephone3 = $request->telephone3;
                $data->telephone4 = $request->telephone4;
                $data->siteweb = $request->siteweb;
                $data->ville = $request->ville;
                $data->pays = $request->pays;
                $data->descriptionCourte = $request->descriptionCourte;
                $data->save();
            } else {
                $filename = time() . '.' . $request->logo->extension();
                $img = $request->file('logo')->storeAs('images/companies/logos', $filename, 'public');

                $data = new Entreprise();
                $data->souscategorie_id = $request->souscategorie_id;
                $data->nom = $request->nom;
                $data->statu = $request->statu;
                $data->email = $request->email;
                $data->adresse = $request->adresse;
                $data->telephone1 = $request->telephone1;
                $data->telephone2 = $request->telephone2;
                $data->telephone3 = $request->telephone3;
                $data->telephone4 = $request->telephone4;
                $data->siteweb = $request->siteweb;
                $data->ville = $request->ville;
                $data->pays = $request->pays;
                $data->descriptionCourte = $request->descriptionCourte;
                $data->logo = $img;
                $data->save();
            }
            return redirect()->back()->with('entreprise', 'Votre Entreprise ajoutée avec succès. Merci :)');
        } catch (Exception $e) {
            return redirect()->back()->with('entreprise', $e->getMessage());
        }
    }
}
