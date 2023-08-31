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
//***********************************************************Login**************************************************** */
    public function login()
    {
        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home');
        } else {
            return view("frontend.home");
        }
    }

//***********************************************************Login Togo**************************************************** */
    public function login_tg()
    {
        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.tg',['pays_id'=>14]);
        } else {
            return view("frontend.tg.home");
        }
    }
//***********************************************************End Login Togo**************************************************** */


//***********************************************************Login côte d'ivoire**************************************************** */
public function login_ci()
{
    if (Auth::check()) {
        // The user is logged in...
        return redirect()->route('home.ci',['pays_id'=>6]);
    } else {
        return view("frontend.ci.home");
    }
}
//***********************************************************End Login côte d'ivoire**************************************************** */


//***********************************************************Login Niger**************************************************** */
public function login_ne()
{
    if (Auth::check()) {
        // The user is logged in...
        return redirect()->route('home.ne',['pays_id'=>11]);
    } else {
        return view("frontend.ne.home");
    }
}
//***********************************************************End Login Niger**************************************************** */



//***********************************************************Login Burkina faso**************************************************** */
public function login_bf()
{
    if (Auth::check()) {
        // The user is logged in...
        return redirect()->route('home.bf',['pays_id'=>2]);
    } else {
        return view("frontend.bf.home");
    }
}
//***********************************************************End Login Burkina faso**************************************************** */



//***********************************************************Login Bénin**************************************************** */
public function login_bj()
{
    if (Auth::check()) {
        // The user is logged in...
        return redirect()->route('home.bj',['pays_id'=>1]);
    } else {
        return view("frontend.bj.home");
    }
}
//***********************************************************End Login Bénin**************************************************** */





//***********************************************************End Login**************************************************** */c





















//***********************************************************Logout**************************************************** */
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

//***********************************************************Logout Togo**************************************************** */
    public function logout_tg()
    {
        auth()->logout();
        return redirect()->route('home.tg',['pays_id'=>14]);
    }
//***********************************************************End Logout Togo**************************************************** */


//***********************************************************Logout côte d'ivoire**************************************************** */
public function logout_ci()
{
    auth()->logout();
    return redirect()->route('home.ci',['pays_id'=>6]);
}
//***********************************************************End Logout côte d'ivoire**************************************************** */



//***********************************************************Logout Niger**************************************************** */
public function logout_ne()
{
    auth()->logout();
    return redirect()->route('home.ne',['pays_id'=>11]);
}
//***********************************************************End Logout Niger**************************************************** */



//***********************************************************Logout Burkina faso**************************************************** */
public function logout_bf()
{
    auth()->logout();
    return redirect()->route('home.bf',['pays_id'=>2]);
}
//***********************************************************End Logout Burkina faso**************************************************** */



//***********************************************************Logout Bénin**************************************************** */
public function logout_bj()
{
    auth()->logout();
    return redirect()->route('home.bj',['pays_id'=>1]);
}
//***********************************************************End Logout Bénin**************************************************** */



//***********************************************************End Logout**************************************************** */























//***********************************************************addUser**************************************************** */
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


//***********************************************************addUser Pays**************************************************** */
    public function addUser_tg($pays_id, Request $request)
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
            $d['password'] = bcrypt($data['password']);
            $data = new User();
            $data->name = $request->name;
            $data->prenoms = $request->prenoms;
            $data->email = $request->email;
            $data->adresse = $request->adresse;
            $data->fonction = $request->fonction;
            $data->telephone1 = $request->telephone1;
            $data->password = $d['password'];
            $data->pays_id = $pays_id;
            $data->save();
            //User::create($data);
            return redirect()->back()->with('user', "Nouveau compte creer avec success !!!");
        } catch (Exception $e) {
            return redirect()->back()->with('user', $e->getMessage());
        }
    }
//***********************************************************End addUser Pays**************************************************** */


//***********************************************************End addUser**************************************************** */
























//***********************************************************authentification**************************************************** */
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

//***********************************************************authentification Togo**************************************************** */
    public function authentification_tg($pays_id, Request $request, User $user)
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
                    return redirect()->route('home.tg',['pays_id'=>14]);
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
//***********************************************************End authentification Togo**************************************************** */


//***********************************************************authentification côte d'ivoire**************************************************** */
public function authentification_ci($pays_id, Request $request, User $user)
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
                return redirect()->route('home.ci',['pays_id'=>6]);
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
//***********************************************************End authentification côte d'ivoire**************************************************** */




//***********************************************************authentification Niger**************************************************** */
public function authentification_ne($pays_id, Request $request, User $user)
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
                return redirect()->route('home.ne',['pays_id'=>11]);
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
//***********************************************************End authentification Niger**************************************************** */



//***********************************************************authentification Burkina faso**************************************************** */
public function authentification_bf($pays_id, Request $request, User $user)
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
                return redirect()->route('home.bf',['pays_id'=>2]);
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
//***********************************************************End authentification Burkina faso**************************************************** */




//***********************************************************authentification Bénin**************************************************** */
public function authentification_bj($pays_id, Request $request, User $user)
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
                return redirect()->route('home.bj',['pays_id'=>1]);
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
//***********************************************************End authentification Bénin**************************************************** */

//***********************************************************End authentification**************************************************** */


















//***********************************************************Entreprise**************************************************** */
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

        return view('frontend.entreprise.enregistrer', compact('parametres', 'sousCategorieNavs', 'pays', 'villes', 'souscategories'));
    }

//***********************************************************End Entreprise**************************************************** */



//***********************************************************Entreprise Togo**************************************************** */

    public function entreprise_tg($pays_id)
    {
        $parametres = DB::table('pays')->where('pays.id', $pays_id)
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->where('parametres.id', 1)
            ->select('*')
            ->get();

        $pays = Pays::all();
        $villes = DB::table('pays')->where('pays.id', $pays_id)
            ->join('villes', 'pays.id', '=', 'villes.pays_id')
            ->select('*')
            ->get();

        $souscategories = DB::table('pays')->where('pays.id', $pays_id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->get();

        return view('frontend.tg.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
    }
//***********************************************************End Entreprise Togo**************************************************** */




//***********************************************************Entreprise côte d'ivoire**************************************************** */

public function entreprise_ci($pays_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 2)
        ->select('*')
        ->get();

    $pays = Pays::all();
    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $souscategories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->select('*')
        ->get();

    return view('frontend.ci.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
}
//***********************************************************End Entreprise côte d'ivoire**************************************************** */




//***********************************************************Entreprise Niger**************************************************** */

public function entreprise_ne($pays_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 3)
        ->select('*')
        ->get();

    $pays = Pays::all();
    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $souscategories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->select('*')
        ->get();

    return view('frontend.ne.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
}
//***********************************************************End Entreprise Niger**************************************************** */




//***********************************************************Entreprise Burkina faso**************************************************** */

public function entreprise_bf($pays_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 4)
        ->select('*')
        ->get();

    $pays = Pays::all();
    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $souscategories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->select('*')
        ->get();

    return view('frontend.bf.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
}
//***********************************************************End Entreprise Burkina faso**************************************************** */





//***********************************************************Entreprise Bénin**************************************************** */

public function entreprise_bj($pays_id)
{
    $parametres = DB::table('pays')->where('pays.id', $pays_id)
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->where('parametres.id', 5)
        ->select('*')
        ->get();

    $pays = Pays::all();
    $villes = DB::table('pays')->where('pays.id', $pays_id)
        ->join('villes', 'pays.id', '=', 'villes.pays_id')
        ->select('*')
        ->get();

    $souscategories = DB::table('pays')->where('pays.id', $pays_id)
        ->join('categories', 'pays.id', '=', 'categories.pays_id')
        ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
        ->select('*')
        ->get();

    return view('frontend.bj.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
}
//***********************************************************End Entreprise Bénin**************************************************** */


//***********************************************************End Entreprise**************************************************** */
}
