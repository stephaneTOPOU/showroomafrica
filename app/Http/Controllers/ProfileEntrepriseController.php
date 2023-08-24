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
    public function ProfileEntreprise($entreprise_id)
    {
        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $parametres = Parametre::find(1);

        $Profil_entreprises = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'souscategorie_id')->where('entreprises.id', $entreprise_id)
            ->select('*', 'entreprises.id as identifiant', 'categories.pays_id as code')
            ->get();

        $premiums = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('sous_categories', 'sous_categories.id', '=', 'souscategorie_id')
            ->where('premium', 1)
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $basics = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('sous_categories', 'sous_categories.id', '=', 'souscategorie_id')
            ->where('basic', 1)
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $avis = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
            ->select('note')
            ->sum('note');

        $avis3 = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
            ->select('note')
            ->get();
        
        $services = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $serviceImages = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
            ->join('service_images', 'service_images.service_id', '=', 'services.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $horaires = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('horaires', 'horaires.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $galleries = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('gallerie_images', 'gallerie_images.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $entreprise = Entreprise::find($entreprise_id);
        $entreprise->increment('vue');
        $entreprise->save();

        $partenaires = DB::table('entreprises')->where('entreprises.id', $entreprise_id)
            ->join('partenaires', 'partenaires.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();
        
        return view('frontend.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises',
    'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
    }
//****************************************************Profile des entreprise************************************************* */





//****************************************************Profile des entreprise Togo************************************************* */
    public function ProfileEntreprise_tg($pays_id, $entreprise_id)
    {
        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();
        
        $sousCategorieNavs = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $Profil_entreprises = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id)
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $premiums = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id)
            ->where('premium', 1)
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $basics = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id)
            ->where('basic', 1)
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $avis = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id)
            ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
            ->select('note')
            ->sum('note');

        $avis3 = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id)
            ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
            ->select('note')
            ->get();
        
        $services = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id)
            ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $serviceImages = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id)
            ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
            ->join('service_images', 'service_images.service_id', '=', 'services.id')
            ->select('*', 'entreprises.id as identifiant', 'service_images.description as servicedesc')
            ->get();

        $horaires = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id)
            ->join('horaires', 'horaires.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $galleries = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id)
            ->join('gallerie_images', 'gallerie_images.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();

        $entreprise = Entreprise::find($entreprise_id);
        $entreprise->increment('vue');
        $entreprise->save();

        $partenaires = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->where('entreprises.id', $entreprise_id)
            ->join('partenaires', 'partenaires.entreprise_id', '=', 'entreprises.id')
            ->select('*', 'entreprises.id as identifiant')
            ->get();
        
        return view('frontend.tg.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises',
    'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
    }

//****************************************************End Profile des entreprise Togo************************************************* */





//****************************************************Profile des entreprise côte d'ivoire************************************************* */
public function ProfileEntreprise_ci($pays_id, $entreprise_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();
    
    $sousCategorieNavs = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->select('*')
        ->take(4)
        ->get();

    $Profil_entreprises = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $premiums = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->where('premium', 1)
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $basics = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->where('basic', 1)
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $avis = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
        ->select('note')
        ->sum('note');

    $avis3 = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
        ->select('note')
        ->get();
    
    $services = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $serviceImages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
        ->join('service_images', 'service_images.service_id', '=', 'services.id')
        ->select('*', 'entreprises.id as identifiant', 'service_images.description as servicedesc')
        ->get();

    $horaires = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('horaires', 'horaires.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $galleries = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('gallerie_images', 'gallerie_images.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $entreprise = Entreprise::find($entreprise_id);
    $entreprise->increment('vue');
    $entreprise->save();

    $partenaires = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('partenaires', 'partenaires.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();
    
    return view('frontend.ci.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises',
'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
}

//****************************************************End Profile des entreprise côte d'ivoire************************************************* */







//****************************************************Profile des entreprise Niger************************************************* */
public function ProfileEntreprise_ne($pays_id, $entreprise_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 3)
        ->select('*')
        ->get();
    
    $sousCategorieNavs = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->select('*')
        ->take(4)
        ->get();

    $Profil_entreprises = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $premiums = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->where('premium', 1)
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $basics = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->where('basic', 1)
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $avis = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
        ->select('note')
        ->sum('note');

    $avis3 = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
        ->select('note')
        ->get();
    
    $services = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $serviceImages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
        ->join('service_images', 'service_images.service_id', '=', 'services.id')
        ->select('*', 'entreprises.id as identifiant', 'service_images.description as servicedesc')
        ->get();

    $horaires = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('horaires', 'horaires.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $galleries = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('gallerie_images', 'gallerie_images.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $entreprise = Entreprise::find($entreprise_id);
    $entreprise->increment('vue');
    $entreprise->save();

    $partenaires = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('partenaires', 'partenaires.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();
    
    return view('frontend.ne.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises',
'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
}

//****************************************************End Profile des entreprise Niger************************************************* */





//****************************************************Profile des entreprise Burkina faso************************************************* */
public function ProfileEntreprise_bf($pays_id, $entreprise_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 4)
        ->select('*')
        ->get();
    
    $sousCategorieNavs = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->select('*')
        ->take(4)
        ->get();

    $Profil_entreprises = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $premiums = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->where('premium', 1)
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $basics = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->where('basic', 1)
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $avis = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
        ->select('note')
        ->sum('note');

    $avis3 = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('commentaires', 'entreprises.id', '=', 'commentaires.entreprise_id')
        ->select('note')
        ->get();
    
    $services = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $serviceImages = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('services', 'services.entreprise_id', '=', 'entreprises.id')
        ->join('service_images', 'service_images.service_id', '=', 'services.id')
        ->select('*', 'entreprises.id as identifiant', 'service_images.description as servicedesc')
        ->get();

    $horaires = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('horaires', 'horaires.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $galleries = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('gallerie_images', 'gallerie_images.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();

    $entreprise = Entreprise::find($entreprise_id);
    $entreprise->increment('vue');
    $entreprise->save();

    $partenaires = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
        ->where('entreprises.id', $entreprise_id)
        ->join('partenaires', 'partenaires.entreprise_id', '=', 'entreprises.id')
        ->select('*', 'entreprises.id as identifiant')
        ->get();
    
    return view('frontend.bf.profileEntreprise', compact('sousCategorieNavs', 'parametres', 'Profil_entreprises',
'avis3', 'avis', 'services', 'serviceImages', 'horaires', 'galleries', 'premiums', 'basics', 'partenaires'));
}

//****************************************************End Profile des entreprise Burkina faso************************************************* */
}
