<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Entreprise;
use App\Models\Parametre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProfileEntrepriseController extends Controller
{
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nom' => 'required',
            'email' => 'required|email',
            'objet' => 'required',
            'message' => 'required'
        ]);
    }

    public function mail(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'objet' => 'required',
            'message' => 'required'
        ]);
        try {
            //  Envoi de mail
            Mail::send('frontend.contact-mail', array(
                /**Ajouter les informations de l'entreprise */
                'entreprise_name' => $request->input('entrprise_nom'),
                'entreprise_email' => $request->input('entrprise_email'),
                /**Fin Ajouter les informations de l'entreprise */
                'name' => $request->input('nom'),
                'email' => $request->input('email'),
                'subject' => $request->input('objet'),
                'form_message' => $request->input('message'),
            ), function ($message) use ($request) {
                $message->from($request->input('email'));
                $message->to('gzk643192@gmail.com', 'Salut K Gz')->subject($request->input('objet'));
            });
            return redirect()->back()->with('success', 'Merci de nous avoir contacté.');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }


    //****************************************************Profile des entreprise************************************************* */
    public function ProfileEntreprise($slug_categorie, $slug_souscategorie, $slug_entreprise)
    {
        $categorie_id = DB::table('categories')->where('slug_categorie', $slug_categorie)->select('id')->get();
        $sousCategorie_id = DB::table('sous_categories')->where('slug_souscategorie', $slug_souscategorie)->select('id')->get();
        $entreprise_id = DB::table('entreprises')->where('slug_entreprise', $slug_entreprise)->select('id')->get();

        $parametres = Parametre::find(1);

        $Profil_entreprises = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->where('categories.id', $categorie_id[0]->id)
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->where('sous_categories.id', $sousCategorie_id[0]->id)
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->select('*', 'entreprises.id as identifiant', 'categories.pays_id as code')
            ->get();

        $premiums = DB::table('entreprises')->where('entreprises.id', $entreprise_id[0]->id)
            ->join('sous_categories', 'sous_categories.id', '=', 'souscategorie_id')
            ->where('premium', 1)
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $basics = DB::table('entreprises')->where('entreprises.id', $entreprise_id[0]->id)
            ->join('sous_categories', 'sous_categories.id', '=', 'souscategorie_id')
            ->where('basic', 1)
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $avis = DB::table('entreprises')->where('entreprises.id', $entreprise_id[0]->id)
            ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
            ->select('note')
            ->sum('note');

        $avis3 = DB::table('entreprises')->where('entreprises.id', $entreprise_id[0]->id)
            ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
            ->select('note')
            ->get();

        $services = DB::table('entreprises')->where('entreprises.id', $entreprise_id[0]->id)
            ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant', 'entreprises.nom as entreprise')
            ->get();

        $serviceImages = DB::table('entreprises')->where('entreprises.id', $entreprise_id[0]->id)
            ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
            ->join('service_images', 'service_images.service_id', '=', 'services.id')
            ->select('*', 'entreprises.id as identifiant', 'entreprises.nom as entreprise')
            ->get();

        $horaires = DB::table('entreprises')->where('entreprises.id', $entreprise_id[0]->id)
            ->join('horaires', 'horaires.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $galleries = DB::table('entreprises')->where('entreprises.id', $entreprise_id[0]->id)
            ->join('gallerie_images', 'gallerie_images.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant', 'entreprises.nom as entreprise', 'entreprises.nom as entreprise')
            ->get();

        $entreprise = Entreprise::find($entreprise_id[0]->id);
        $entreprise->increment('vue');
        $entreprise->save();

        $partenaires = DB::table('entreprises')->where('entreprises.id', $entreprise_id[0]->id)
            ->join('partenaires', 'partenaires.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant', 'entreprises.nom as entreprise')
            ->get();

        return view('frontend.profileEntreprise', compact('parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
    }
    //****************************************************Profile des entreprise************************************************* */


    //****************************************************Profile des entreprise pays************************************************* */
    public function ProfileEntreprise_pays($slug_pays, $slug_categorie, $slug_souscategorie, $slug_entreprise)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();
        $categorie_id = DB::table('categories')->where('slug_categorie', $slug_categorie)->select('id')->get();
        $sousCategorie_id = DB::table('sous_categories')->where('slug_souscategorie', $slug_souscategorie)->select('id')->get();
        $entreprise_id = DB::table('entreprises')->where('slug_entreprise', $slug_entreprise)->select('id')->get();

        $Profil_entreprises = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->select('*', 'entreprises.id as identifiant', 'pays.id as pays_id')
            ->get();

        $premiums = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->where('premium', 1)
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $basics = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->where('basic', 1)
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $avis = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
            ->select('note')
            ->sum('note');

        $avis3 = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
            ->select('note')
            ->get();

        $services = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant', 'entreprises.nom as entreprise')
            ->get();

        $serviceImages = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
            ->join('service_images', 'service_images.service_id', '=', 'services.id')
            ->select('*', 'entreprises.id as identifiant', 'service_images.description as servicedesc', 'entreprises.nom as entreprise')
            ->get();

        $horaires = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->join('horaires', 'horaires.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $galleries = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->join('gallerie_images', 'gallerie_images.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant', 'entreprises.nom as entreprise')
            ->get();

        $entreprise = Entreprise::find($entreprise_id[0]->id);
        $entreprise->increment('vue');
        $entreprise->save();

        $partenaires = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id[0]->id)
            ->join('partenaires', 'partenaires.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant', 'entreprises.nom as entreprise')
            ->get();

        if ($slug_pays == 'tg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.tg.profileEntreprise', compact('parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'bf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 4)
                ->select('*')
                ->get();
            return view('frontend.bf.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'bj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 5)
                ->select('*')
                ->get();
            return view('frontend.bj.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'ci') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 2)
                ->select('*')
                ->get();
            return view('frontend.ci.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'ne') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ne.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'cm') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.cm.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'cf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.cf.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'dj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.dj.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'ga') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.ga.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'gn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.gn.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'mg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.mg.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'ml') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 6)
            ->select('*')
            ->get();
            return view('frontend.ml.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'mr') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.mr.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'cd') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.cd.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'rw') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.rw.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'sn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.sn.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } elseif ($slug_pays == 'td') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
            return view('frontend.td.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        } else {
            $parametres = Parametre::find(1);
            return view('frontend.profileEntreprise', compact('parametres', 'Profil_entreprises', 'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
        }
    }

    //****************************************************End Profile des entreprise pays************************************************* */

}
