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

    //***********************************************************Login pays**************************************************** */
    public function login_pays()
    {
        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'tg']);
        } else {
            return view("frontend.tg.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'bj']);
        } else {
            return view("frontend.bj.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'bf']);
        } else {
            return view("frontend.bf.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'ci']);
        } else {
            return view("frontend.ci.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'ne']);
        } else {
            return view("frontend.ne.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'cm']);
        } else {
            return view("frontend.cm.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'cf']);
        } else {
            return view("frontend.cf.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'cg']);
        } else {
            return view("frontend.cg.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'dj']);
        } else {
            return view("frontend.dj.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'ga']);
        } else {
            return view("frontend.ga.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'gn']);
        } else {
            return view("frontend.gn.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'mg']);
        } else {
            return view("frontend.mg.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'ml']);
        } else {
            return view("frontend.ml.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'mr']);
        } else {
            return view("frontend.mr.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'cd']);
        } else {
            return view("frontend.cd.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'rw']);
        } else {
            return view("frontend.rw.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'sn']);
        } else {
            return view("frontend.sn.home");
        }

        if (Auth::check()) {
            // The user is logged in...
            return redirect()->route('home.pays', ['slug_pays' => 'td']);
        } else {
            return view("frontend.td.home");
        }
    }
    //***********************************************************End Login pays**************************************************** */

    //***********************************************************End Login**************************************************** */c





















    //***********************************************************Logout**************************************************** */
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    //***********************************************************Logout Pays**************************************************** */
    public function logout_pays($slug_pays)
    {
        auth()->logout();
        if ($slug_pays == 'tg') {
            return redirect()->route('home.pays', ['slug_pays' => 'tg']);
        } elseif ($slug_pays == 'bf') {
            return redirect()->route('home.pays', ['slug_pays' => 'bf']);
        } elseif ($slug_pays == 'bj') {
            return redirect()->route('home.pays', ['slug_pays' => 'bj']);
        } elseif ($slug_pays == 'ci') {
            return redirect()->route('home.pays', ['slug_pays' => 'ci']);
        } elseif ($slug_pays == 'ne') {
            return redirect()->route('home.pays', ['slug_pays' => 'ne']);
        } elseif ($slug_pays == 'cm') {
            return redirect()->route('home.pays', ['slug_pays' => 'cm']);
        } elseif ($slug_pays == 'cf') {
            return redirect()->route('home.pays', ['slug_pays' => 'cf']);
        } elseif ($slug_pays == 'dj') {
            return redirect()->route('home.pays', ['slug_pays' => 'dj']);
        } elseif ($slug_pays == 'ga') {
            return redirect()->route('home.pays', ['slug_pays' => 'ga']);
        } elseif ($slug_pays == 'gn') {
            return redirect()->route('home.pays', ['slug_pays' => 'gn']);
        } elseif ($slug_pays == 'mg') {
            return redirect()->route('home.pays', ['slug_pays' => 'mg']);
        } elseif ($slug_pays == 'ml') {
            return redirect()->route('home.pays', ['slug_pays' => 'ml']);
        } elseif ($slug_pays == 'mr') {
            return redirect()->route('home.pays', ['slug_pays' => 'mr']);
        } elseif ($slug_pays == 'cd') {
            return redirect()->route('home.pays', ['slug_pays' => 'cd']);
        } elseif ($slug_pays == 'rw') {
            return redirect()->route('home.pays', ['slug_pays' => 'rw']);
        } elseif ($slug_pays == 'sn') {
            return redirect()->route('home.pays', ['slug_pays' => 'sn']);
        } elseif ($slug_pays == 'td') {
            return redirect()->route('home.pays', ['slug_pays' => 'td']);
        } else {
            return redirect()->route('home');
        }
    }
    //***********************************************************End Logout Pays**************************************************** */


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
    public function addUser_pays($slug_pays, Request $request)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();
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
            $data->pays_id = $pays_id[0]->id;
            $data->save();
            //User::create($data);
            return redirect()->back()->with('user', "Votre compte a été créé avec success !!!");
        } catch (Exception $e) {
            return redirect()->back()->with('user', $e->getMessage());
        }
    }
    //***********************************************************End addUser Pays**************************************************** */


    //***********************************************************End addUser**************************************************** */
























    //***********************************************************authentification**************************************************** */
    //***********************************************************authentification Afrique**************************************************** */
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
    //***********************************************************authentification Afrique**************************************************** */
    //***********************************************************authentification Pays**************************************************** */
    public function authentification_pays($slug_pays, Request $request, User $user)
    {
        // $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();
        // $credentials = $request->only('email', 'password');
        $login = $request->email;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            if (User::where('email', $login)->count() > 0) {
                if (Auth::attempt(['email' => $login, 'password' => $request->password])) {
                    //return 'Connexion reussi avec success';
                    if ($slug_pays == 'tg') {
                        return redirect()->route('home.pays', ['slug_pays' => 'tg']);
                    } elseif ($slug_pays == 'bf') {
                        return redirect()->route('home.pays', ['slug_pays' => 'bf']);
                    } elseif ($slug_pays == 'bj') {
                        return redirect()->route('home.pays', ['slug_pays' => 'bj']);
                    } elseif ($slug_pays == 'ci') {
                        return redirect()->route('home.pays', ['slug_pays' => 'ci']);
                    } elseif ($slug_pays == 'ne') {
                        return redirect()->route('home.pays', ['slug_pays' => 'ne']);
                    } elseif ($slug_pays == 'cm') {
                        return redirect()->route('home.pays', ['slug_pays' => 'cm']);
                    } elseif ($slug_pays == 'cf') {
                        return redirect()->route('home.pays', ['slug_pays' => 'cf']);
                    } elseif ($slug_pays == 'dj') {
                        return redirect()->route('home.pays', ['slug_pays' => 'dj']);
                    } elseif ($slug_pays == 'ga') {
                        return redirect()->route('home.pays', ['slug_pays' => 'ga']);
                    } elseif ($slug_pays == 'gn') {
                        return redirect()->route('home.pays', ['slug_pays' => 'gn']);
                    } elseif ($slug_pays == 'mg') {
                        return redirect()->route('home.pays', ['slug_pays' => 'mg']);
                    } elseif ($slug_pays == 'ml') {
                        return redirect()->route('home.pays', ['slug_pays' => 'ml']);
                    } elseif ($slug_pays == 'mr') {
                        return redirect()->route('home.pays', ['slug_pays' => 'mr']);
                    } elseif ($slug_pays == 'cd') {
                        return redirect()->route('home.pays', ['slug_pays' => 'cd']);
                    } elseif ($slug_pays == 'rw') {
                        return redirect()->route('home.pays', ['slug_pays' => 'rw']);
                    } elseif ($slug_pays == 'sn') {
                        return redirect()->route('home.pays', ['slug_pays' => 'sn']);
                    } elseif ($slug_pays == 'td') {
                        return redirect()->route('home.pays', ['slug_pays' => 'td']);
                    } else {
                        return redirect()->route('home');
                    }
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
    //***********************************************************End authentification Pays**************************************************** */

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



    //***********************************************************Entreprise pays**************************************************** */

    public function entreprise_pays($slug_pays)
    {
        $pays_id = DB::table('pays')->where('slug_pays', $slug_pays)->select('id')->get();

        $pays = Pays::all();
        $villes = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('villes', 'pays.id', '=', 'villes.pays_id')
            ->select('*')
            ->get();

        $souscategories = DB::table('pays')->where('pays.id', $pays_id[0]->id)
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->select('*')
            ->get();

        if ($slug_pays == 'tg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 1)
                ->select('*')
                ->get();
            return view('frontend.tg.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'bf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 4)
                ->select('*')
                ->get();
            return view('frontend.bf.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'bj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 5)
                ->select('*')
                ->get();
            return view('frontend.bj.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'ci') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 2)
                ->select('*')
                ->get();
            return view('frontend.ci.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'ne') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ne.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'cm') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.cm.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'cf') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.cf.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'dj') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.dj.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'ga') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.ga.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'gn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.gn.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'mg') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.mg.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'ml') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 6)
                ->select('*')
                ->get();
            return view('frontend.ml.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'mr') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.mr.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'cd') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.cd.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'rw') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.rw.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'sn') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.sn.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } elseif ($slug_pays == 'td') {
            $parametres = DB::table('pays')->where('pays.id', $pays_id[0]->id)
                ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
                ->where('parametres.id', 3)
                ->select('*')
                ->get();
            return view('frontend.td.entreprise.enregistrer', compact('parametres', 'pays', 'villes', 'souscategories'));
        } else {
            $parametres = Parametre::find(1);
            return view('frontend.entreprise.enregistrer', compact('parametres', 'sousCategorieNavs', 'pays', 'villes', 'souscategories'));
        }
    }
    //***********************************************************End Entreprise pays**************************************************** */



    //***********************************************************End Entreprise**************************************************** */
}
