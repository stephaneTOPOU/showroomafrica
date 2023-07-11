<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActionEntrepriseController extends Controller
{
    public function addEntreprise(Request $request)
    {
        $data = $request->validate([
            'nom' => 'string',
            'adresse' => 'string',
            'telephone1' => 'string',
        ]);

        try {
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
                
                if ($request->hasFile('logo') ) {

                    //get filename with extension
                    $filenamewithextension = $request->file('logo')->getClientOriginalName();
            
                    //get filename without extension
                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            
                    //get file extension
                    $extension = $request->file('logo')->getClientOriginalExtension();
            
                    //filename to store
                    $filenametostore = $filename.'_'.uniqid().'.'.$extension;
    
                    //Upload File to external server
                    Storage::disk('ftp')->put($filenametostore, fopen($request->file('logo'), 'r+'));
    
                    //Upload name to database
                    $data->logo = $filenametostore;
                }
                
                $data->save();
            return redirect()->back()->with('entreprise', 'Votre Entreprise ajoutée avec succès. Merci :)');
        } catch (Exception $e) {
            return redirect()->back()->with('entreprise', $e->getMessage());
        }
    }
}
