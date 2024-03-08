<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Models\commentaireAnnonce;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class AnnonceController extends Controller
{
    public function annonce($slug_annonce)
    {
        //dd($slug_annonce);
        $annonce_id = DB::table('annonces')->where('slug_annonce', $slug_annonce)->select('id')->get();
        
        $parametres = Parametre::find(1);
        $annonces = DB::table('annonces')->where('id',$annonce_id[0]->id)
            ->select('*')
            ->get();

        $actualites = DB::table('annonces')
            ->select('*')
            ->inRandomOrder()->get();

        $commentaires = DB::table('annonces')->where('annonces.id',$annonce_id[0]->id)
            ->join('commentaire_annonces', 'annonces.id', '=', 'commentaire_annonces.annonce_id')
            ->select('*')
            ->orderBy('commentaire_annonces.id', 'desc')
            ->get();
        return view('frontend.annonce',compact('parametres','annonces', 'actualites', 'commentaires'));
    }

    public function commentaire(Request $request, $slug_annonce)
    {
        $annonce_id = DB::table('annonces')->where('slug_annonce', $slug_annonce)->select('id')->get();
        $data = $request->validate([
            'pseudo' => 'required|string',
            'commentaire' => 'required|string',
        ]);
        //dd($request->all());
        try {
            $data = new commentaireAnnonce();
            $data->annonce_id = $annonce_id[0]->id;
            $data->pseudo = $request->pseudo;
            $data->commentaire = $request->commentaire;
            $data->save();
            return redirect()->back()->with('comment', "Commentaire ajouté avec success :) ");
        } catch (Exception $e) {
            return redirect()->back()->with('comment', $e->getMessage());
        }
    }
}
