<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Parametre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
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

    public function save(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'objet' => 'required',
            'message' => 'required'
        ]);
        try {

            Contact::create($request->all());
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
    public function contact()
    {
        $parametres = Parametre::find(1);
        
        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();
            
        return view('frontend.contact', compact('parametres', 'sousCategorieNavs'));
    }
    //******************************************Contact Togo******************************************************** */
    public function contact_tg($pays_id)
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
            
        return view('frontend.tg.contact', compact('parametres', 'sousCategorieNavs'));
    }
    //************************************************End Contact Togo************************************************** */




    //******************************************Contact côte d'ivoire******************************************************** */
    public function contact_ci($pays_id)
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
            
        return view('frontend.ci.contact', compact('parametres', 'sousCategorieNavs'));
    }
    //************************************************End Contact côte d'ivoire************************************************** */
}
