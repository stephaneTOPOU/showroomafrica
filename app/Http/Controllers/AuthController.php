<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Parametre;
use App\Models\Pays;
use App\Models\SousCategories;
use App\Models\User;
use App\Models\Ville;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home');
        } else {
            return view("frontend.home");
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function addUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'prenoms' => 'required|string',
            'email' => 'required|email',
            'adresse' => 'required|string',
            'fonction' => 'required|string',
            'telephone1' => 'required|string',
            'password' => 'required|string|min:8',
            'password2' => 'required_with:password|same:password|min:8'

        ]);
        //dd($request->all());
        try {
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            return redirect()->back()->with('user', "Nouveau compte creer avec success !!!");
        } catch (Exception $e) {
            return redirect()->back()->with('user', $e->getMessage());
        }
    }

    public function authentification(Request $request, User $user)
    {
        $credentials = $request->only('email', 'password');
        $login = $request->email;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            if (User::where('email', $login)->count() > 0) {
                if (Auth::attempt(['email' => $login, 'password' => $request->password])) {
                    return redirect()->route('home');
                    //return 'Connexion reussi avec success';
                } else {
                    return redirect()->back()->with('connexion', "Vos identifiants ne correspondent pas !!!1");
                }
            } else {
                return redirect()->back()->with('connexion', "Vos identifiants ne correspondent pas !!!2");
            }
        } catch (Exception $e) {
            return redirect()->back()->with('connexion', $e->getMessage());
        }
    }



    public function entreprise()
    {
        $parametres = Parametre::find(1);

        $sousCategorieNavs = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->take(4)
            ->get();

        $pays = Pays::all();
        $villes = Ville::all();
        $souscategories = SousCategories::all();

        return view('frontend.tg.entreprise.enregistrer', compact('parametres', 'sousCategorieNavs', 'pays', 'villes', 'souscategories'));
    }
}
