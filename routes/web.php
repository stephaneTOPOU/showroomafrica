<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::redirect('/', '/geoip');

Route::get('/', function () {
    $geoipInfo = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
    // return $geoipInfo->iso_code;
    if ($geoipInfo->iso_code == 'US') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_tg'],
            ['pays_id' => 14]
        );
    } elseif ($geoipInfo->iso_code == 'BJ') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_bj'],
            ['pays_id' => 1]
        );
    } elseif ($geoipInfo->iso_code == 'BF') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_bf'],
            ['pays_id' => 2]
        );
    } elseif ($geoipInfo->iso_code == 'BI') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_bi'],
            ['pays_id' => 21]
        );
    } elseif ($geoipInfo->iso_code == 'CM') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_cm'],
            ['pays_id' => 3]
        );
    } elseif ($geoipInfo->iso_code == 'CF') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_cf'],
            ['pays_id' => 4]
        );
    } elseif ($geoipInfo->iso_code == 'CG') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_cg'],
            ['pays_id' => 5]
        );
    } elseif ($geoipInfo->iso_code == 'CI') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_ci'],
            ['pays_id' => 6]
        );
    } elseif ($geoipInfo->iso_code == 'DJ') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_dj'],
            ['pays_id' => 22]
        );
    } elseif ($geoipInfo->iso_code == 'GA') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_ga'],
            ['pays_id' => 7]
        );
    } elseif ($geoipInfo->iso_code == 'GN') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_gn'],
            ['pays_id' => 26]
        );
    } elseif ($geoipInfo->iso_code == 'MG') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_mg'],
            ['pays_id' => 23]
        );
    } elseif ($geoipInfo->iso_code == 'ML') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_ml'],
            ['pays_id' => 10]
        );
    } elseif ($geoipInfo->iso_code == 'MR') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_bj'],
            ['pays_id' => 24]
        );
    } elseif ($geoipInfo->iso_code == 'NE') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_ne'],
            ['pays_id' => 11]
        );
    } elseif ($geoipInfo->iso_code == 'CD') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_cd'],
            ['pays_id' => 15]
        );
    } elseif ($geoipInfo->iso_code == 'RW') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_rw'],
            ['pays_id' => 25]
        );
    } elseif ($geoipInfo->iso_code == 'SN') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_sn'],
            ['pays_id' => 12]
        );
    } elseif ($geoipInfo->iso_code == 'TD') {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index_td'],
            ['pays_id' => 13]
        );
    } else {
        return redirect()->action(
            [App\Http\Controllers\HomeController::class, 'index']
        );
    }
});

//Route::redirect('/geoip', '/');
//******************************************Pour l'Afrique***************************************************//
Route::get('/annuaire',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/annonce/{annonce_id}',[App\Http\Controllers\AnnonceController::class, 'annonce'])->name('annonce');

Route::post('/annonce/{annonce_id}',[App\Http\Controllers\AnnonceController::class, 'commentaire'])->name('annonce.commentaire');

Route::get('/autocomplete',[App\Http\Controllers\HomeController::class, 'autocompletion'])->name('autocomplete');

Route::get('/rechercher-entreprise', [App\Http\Controllers\HomeController::class, 'recherche'])->name('recherche');

Route::get('/enregistrer-entreprise', [\App\Http\Controllers\AuthController::class, 'entreprise'])->name('entreprise.register');

Route::get('/professionnel', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel'])->name('professionnel');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact');

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'save'])->name('contact.save');

Route::get('/categories', [\App\Http\Controllers\CategoriesController::class, 'categories'])->name('categorie');

Route::get('/sous-categories/{categorie_id}', [\App\Http\Controllers\SousCategoriesController::class, 'Souscategories'])->name('subcat');

Route::get('/entreprise/{souscategorie_id}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise'])->name('entreprise');

Route::post('/entreprise-commentaire/{entreprise_id}', [\App\Http\Controllers\CommentaireController::class, 'commentaire'])->name('entreprise.commentaire');

Route::get('/entreprise-profil/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise'])->name('entreprise.profil');

Route::post('/entreprise-profil/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'mail'])->name('entreprise.form');

Route::get('/pharmacie', [\App\Http\Controllers\PharmacieController::class, 'pharmacie'])->name('pharmacie');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::post('/ajouter-user', [\App\Http\Controllers\AuthController::class, 'addUser'])->name('user.add');

Route::post('/authentification', [\App\Http\Controllers\AuthController::class, 'authentification'])->name('authenticate');

Route::post('/ajouter-entreprise', [\App\Http\Controllers\ActionEntrepriseController::class, 'addEntreprise'])->name('entreprise.add');

Route::get('/siteweb', [\App\Http\Controllers\ServiceController::class, 'siteweb'])->name('service.siteweb');

Route::post('/rechercher-entreprise', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.recherche');

Route::post('/entreprise/{entreprise_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.entreprise');

//****************************************************end Afrique************************************************//



//****************************************************Pour le Togo***********************************************//
Route::get('/tg/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_tg'])->name('home.tg');

Route::get('/tg/autocomplete/{pays_id}', [App\Http\Controllers\HomeController::class, 'autocompletion_tg'])->name('autocomplete.tg');

Route::get('/tg/rechercher-entreprise/{pays_id}', [App\Http\Controllers\HomeController::class, 'recherche_tg'])->name('recherche.tg');

Route::get('/tg/enregistrer-entreprise/{pays_id}', [\App\Http\Controllers\AuthController::class, 'entreprise_tg'])->name('entreprise.register.tg');

Route::get('/tg/professionnel/{pays_id}', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel_tg'])->name('professionnel.tg');

Route::get('/tg/contact/{pays_id}', [\App\Http\Controllers\ContactController::class, 'contact_tg'])->name('contact.tg');

Route::get('/tg/categories/{pays_id}', [\App\Http\Controllers\CategoriesController::class, 'categories_tg'])->name('categorie.tg');

Route::get('/tg/sous-categories/{pays_id}/{categorie_id}', [\App\Http\Controllers\SousCategoriesController::class, 'Souscategories_tg'])->name('subcat.tg');

Route::get('/tg/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise_tg'])->name('entreprise.tg');

Route::get('/tg/entreprise-profil/{pays_id}/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise_tg'])->name('entreprise.tg.profil');

Route::get('/tg/pharmacie/{pays_id}', [\App\Http\Controllers\PharmacieController::class, 'pharmacie_tg'])->name('pharmacie.tg');

Route::get('/tg/login/{pays_id}', [\App\Http\Controllers\AuthController::class, 'login_tg'])->name('login.tg');

Route::get('/tg/logout/{pays_id}', [\App\Http\Controllers\AuthController::class, 'logout_tg'])->name('logout.tg');

Route::post('/tg/ajouter-user/{pays_id}', [\App\Http\Controllers\AuthController::class, 'addUser_tg'])->name('user.tg.add');

Route::post('/tg/authentification/{pays_id}', [\App\Http\Controllers\AuthController::class, 'authentification_tg'])->name('authenticate.tg');

Route::post('/tg/ajouter-entreprise/{pays_id}', [\App\Http\Controllers\ActionEntrepriseController::class, 'addEntreprise'])->name('entreprise.tg.add');

Route::get('/tg/siteweb/{pays_id}', [\App\Http\Controllers\ServiceController::class, 'siteweb_tg'])->name('service.tg.siteweb');

Route::post('/tg/rechercher-entreprise/{pays_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.tg.recherche');

Route::post('/tg/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.tg.entreprise');

//****************************************************End Pour le Togo***********************************************//



//****************************************************Pour le Bénin***********************************************//
Route::get('/bj/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_bj'])->name('home.bj');

Route::get('/bj/autocomplete/{pays_id}', [App\Http\Controllers\HomeController::class, 'autocompletion_bj'])->name('autocomplete.bj');

Route::get('/bj/rechercher-entreprise/{pays_id}', [App\Http\Controllers\HomeController::class, 'recherche_bj'])->name('recherche.bj');

Route::get('/bj/enregistrer-entreprise/{pays_id}', [\App\Http\Controllers\AuthController::class, 'entreprise_bj'])->name('entreprise.register.bj');

Route::get('/bj/professionnel/{pays_id}', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel_bj'])->name('professionnel.bj');

Route::get('/bj/contact/{pays_id}', [\App\Http\Controllers\ContactController::class, 'contact_bj'])->name('contact.bj');

Route::get('/bj/categories/{pays_id}', [\App\Http\Controllers\CategoriesController::class, 'categories_bj'])->name('categorie.bj');

Route::get('/bj/sous-categories/{pays_id}/{categorie_id}', [\App\Http\Controllers\SousCategoriesController::class, 'Souscategories_bj'])->name('subcat.bj');

Route::get('/bj/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise_bj'])->name('entreprise.bj');

Route::get('/bj/entreprise-profil/{pays_id}/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise_bj'])->name('entreprise.bj.profil');

Route::get('/bj/pharmacie/{pays_id}', [\App\Http\Controllers\PharmacieController::class, 'pharmacie_bj'])->name('pharmacie.bj');

Route::get('/bj/login/{pays_id}', [\App\Http\Controllers\AuthController::class, 'login_bj'])->name('login.bj');

Route::get('/bj/logout/{pays_id}', [\App\Http\Controllers\AuthController::class, 'logout_bj'])->name('logout.bj');

Route::post('/bj/ajouter-user/{pays_id}', [\App\Http\Controllers\AuthController::class, 'addUser_bj'])->name('user.bj.add');

Route::post('/bj/authentification/{pays_id}', [\App\Http\Controllers\AuthController::class, 'authentification_bj'])->name('authenticate.bj');

Route::post('/bj/ajouter-entreprise/{pays_id}', [\App\Http\Controllers\ActionEntrepriseController::class, 'addEntreprise'])->name('entreprise.bj.add');

Route::get('/bj/siteweb/{pays_id}', [\App\Http\Controllers\ServiceController::class, 'siteweb_bj'])->name('service.bj.siteweb');

Route::post('/bj/rechercher-entreprise/{pays_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.bj.recherche');

Route::post('/bj/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.bj.entreprise');

//****************************************************Pour le Bénin***********************************************//



//****************************************************Pour le Burkina faso***********************************************//
Route::get('/bf/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_bf'])->name('home.bf');

Route::get('/bf/autocomplete/{pays_id}', [App\Http\Controllers\HomeController::class, 'autocompletion_bf'])->name('autocomplete.bf');

Route::get('/bf/rechercher-entreprise/{pays_id}', [App\Http\Controllers\HomeController::class, 'recherche_bf'])->name('recherche.bf');

Route::get('/bf/enregistrer-entreprise/{pays_id}', [\App\Http\Controllers\AuthController::class, 'entreprise_bf'])->name('entreprise.register.bf');

Route::get('/bf/professionnel/{pays_id}', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel_bf'])->name('professionnel.bf');

Route::get('/bf/contact/{pays_id}', [\App\Http\Controllers\ContactController::class, 'contact_bf'])->name('contact.bf');

Route::get('/bf/categories/{pays_id}', [\App\Http\Controllers\CategoriesController::class, 'categories_bf'])->name('categorie.bf');

Route::get('/bf/sous-categories/{pays_id}/{categorie_id}', [\App\Http\Controllers\SousCategoriesController::class, 'Souscategories_bf'])->name('subcat.bf');

Route::get('/bf/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise_bf'])->name('entreprise.bf');

Route::get('/bf/entreprise-profil/{pays_id}/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise_bf'])->name('entreprise.bf.profil');

Route::get('/bf/pharmacie/{pays_id}', [\App\Http\Controllers\PharmacieController::class, 'pharmacie_bf'])->name('pharmacie.bf');

Route::get('/bf/login/{pays_id}', [\App\Http\Controllers\AuthController::class, 'login_bf'])->name('login.bf');

Route::get('/bf/logout/{pays_id}', [\App\Http\Controllers\AuthController::class, 'logout_bf'])->name('logout.bf');

Route::post('/bf/ajouter-user/{pays_id}', [\App\Http\Controllers\AuthController::class, 'addUser_tg'])->name('user.bf.add');

Route::post('/bf/authentification/{pays_id}', [\App\Http\Controllers\AuthController::class, 'authentification_bf'])->name('authenticate.bf');

Route::post('/bf/ajouter-entreprise/{pays_id}', [\App\Http\Controllers\ActionEntrepriseController::class, 'addEntreprise'])->name('entreprise.bf.add');

Route::get('/bf/siteweb/{pays_id}', [\App\Http\Controllers\ServiceController::class, 'siteweb_bf'])->name('service.bf.siteweb');

Route::post('/bf/rechercher-entreprise/{pays_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.bf.recherche');

Route::post('/bf/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.bf.entreprise');

//****************************************************Pour le Burkina faso***********************************************//




//****************************************************Pour Burundi***********************************************//
Route::get('/bi/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_bi'])->name('home.bi');

//****************************************************Pour Burundi***********************************************//



//****************************************************Pour le Cameroun***********************************************//
Route::get('/cm/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_cm'])->name('home.cm');

//****************************************************Pour le Cameroun***********************************************//



//****************************************************Pour Centrafrique ***********************************************//
Route::get('/cf/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_cf'])->name('home.cf');

//****************************************************Pour Centrafrique ***********************************************//





//****************************************************Pour Congo Brazzaville ***********************************************//
Route::get('/cg/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_cg'])->name('home.cg');

//****************************************************Pour Congo Brazzaville ***********************************************//





//****************************************************Pour Cote divoire***********************************************//
Route::get('/ci/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_ci'])->name('home.ci');

Route::get('/ci/autocomplete/{pays_id}', [App\Http\Controllers\HomeController::class, 'autocompletion_ci'])->name('autocomplete.ci');

Route::get('/ci/rechercher-entreprise/{pays_id}', [App\Http\Controllers\HomeController::class, 'recherche_ci'])->name('recherche.ci');

Route::get('/ci/enregistrer-entreprise/{pays_id}', [\App\Http\Controllers\AuthController::class, 'entreprise_ci'])->name('entreprise.register.ci');

Route::get('/ci/professionnel/{pays_id}', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel_ci'])->name('professionnel.ci');

Route::get('/ci/contact/{pays_id}', [\App\Http\Controllers\ContactController::class, 'contact_ci'])->name('contact.ci');

Route::get('/ci/categories/{pays_id}', [\App\Http\Controllers\CategoriesController::class, 'categories_ci'])->name('categorie.ci');

Route::get('/ci/sous-categories/{pays_id}/{categorie_id}', [\App\Http\Controllers\SousCategoriesController::class, 'Souscategories_ci'])->name('subcat.ci');

Route::get('/ci/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise_ci'])->name('entreprise.ci');

Route::get('/ci/entreprise-profil/{pays_id}/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise_ci'])->name('entreprise.ci.profil');

Route::get('/ci/pharmacie/{pays_id}', [\App\Http\Controllers\PharmacieController::class, 'pharmacie_ci'])->name('pharmacie.ci');

Route::get('/ci/login/{pays_id}', [\App\Http\Controllers\AuthController::class, 'login_ci'])->name('login.ci');

Route::get('/ci/logout/{pays_id}', [\App\Http\Controllers\AuthController::class, 'logout_ci'])->name('logout.ci');

Route::post('/ci/ajouter-user/{pays_id}', [\App\Http\Controllers\AuthController::class, 'addUser_tg'])->name('user.ci.add');

Route::post('/ci/authentification/{pays_id}', [\App\Http\Controllers\AuthController::class, 'authentification_ci'])->name('authenticate.ci');

Route::post('/ci/ajouter-entreprise/{pays_id}', [\App\Http\Controllers\ActionEntrepriseController::class, 'addEntreprise'])->name('entreprise.ci.add');

Route::get('/ci/siteweb/{pays_id}', [\App\Http\Controllers\ServiceController::class, 'siteweb_ci'])->name('service.ci.siteweb');

Route::post('/ci/rechercher-entreprise/{pays_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.ci.recherche');

Route::post('/ci/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.ci.entreprise');

//****************************************************Pour Cote divoire***********************************************//






//****************************************************Pour Djibouti***********************************************//
Route::get('/dj/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_dj'])->name('home.dj');

//****************************************************Pour Djibouti***********************************************//




//****************************************************Pour le Gabon ***********************************************//
Route::get('/ga/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_ga'])->name('home.ga');

//****************************************************Pour le Gabon ***********************************************//






//****************************************************Pour Guinée conakry***********************************************//
Route::get('/gn/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_gn'])->name('home.gn');

//****************************************************Pour Guinée conakry***********************************************//







//****************************************************Pour MAdagascar ***********************************************//
Route::get('/mg/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_mg'])->name('home.mg');

//****************************************************Pour MAdagascar ***********************************************//






//****************************************************Pour le Mali ***********************************************//
Route::get('/ml/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_ml'])->name('home.ml');

//****************************************************Pour le Mali ***********************************************//




//****************************************************Pour Mauritanie ***********************************************//
Route::get('/mr/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_mr'])->name('home.mr');

//****************************************************Pour Mauritanie ***********************************************//




//****************************************************Pour le Niger ***********************************************//
Route::get('/ne/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_ne'])->name('home.ne');

Route::get('/ne/autocomplete/{pays_id}', [App\Http\Controllers\HomeController::class, 'autocompletion_ne'])->name('autocomplete.ne');

Route::get('/ne/rechercher-entreprise/{pays_id}', [App\Http\Controllers\HomeController::class, 'recherche_ne'])->name('recherche.ne');

Route::get('/ne/enregistrer-entreprise/{pays_id}', [\App\Http\Controllers\AuthController::class, 'entreprise_ne'])->name('entreprise.register.ne');

Route::get('/ne/professionnel/{pays_id}', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel_ne'])->name('professionnel.ne');

Route::get('/ne/contact/{pays_id}', [\App\Http\Controllers\ContactController::class, 'contact_ne'])->name('contact.ne');

Route::get('/ne/categories/{pays_id}', [\App\Http\Controllers\CategoriesController::class, 'categories_ne'])->name('categorie.ne');

Route::get('/ne/sous-categories/{pays_id}/{categorie_id}', [\App\Http\Controllers\SousCategoriesController::class, 'Souscategories_ne'])->name('subcat.ne');

Route::get('/ne/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise_ne'])->name('entreprise.ne');

Route::get('/ne/entreprise-profil/{pays_id}/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise_ne'])->name('entreprise.ne.profil');

Route::get('/ne/pharmacie/{pays_id}', [\App\Http\Controllers\PharmacieController::class, 'pharmacie_ne'])->name('pharmacie.ne');

Route::get('/ne/login/{pays_id}', [\App\Http\Controllers\AuthController::class, 'login_ne'])->name('login.ne');

Route::get('/ne/logout/{pays_id}', [\App\Http\Controllers\AuthController::class, 'logout_ne'])->name('logout.ne');

Route::post('/ne/ajouter-user/{pays_id}', [\App\Http\Controllers\AuthController::class, 'addUser_tg'])->name('user.ne.add');

Route::post('/ne/authentification/{pays_id}', [\App\Http\Controllers\AuthController::class, 'authentification_ne'])->name('authenticate.ne');

Route::post('/ne/ajouter-entreprise/{pays_id}', [\App\Http\Controllers\ActionEntrepriseController::class, 'addEntreprise'])->name('entreprise.ne.add');

Route::get('/ne/siteweb/{pays_id}', [\App\Http\Controllers\ServiceController::class, 'siteweb_ne'])->name('service.ne.siteweb');

Route::post('/ne/rechercher-entreprise/{pays_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.ne.recherche');

Route::post('/ne/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.ne.entreprise');

//****************************************************Pour le Niger ***********************************************//




//****************************************************Pour RDC ***********************************************//
Route::get('/cd/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_cd'])->name('home.cd');

//****************************************************Pour RDC ***********************************************//




//****************************************************Pour le rwanda ***********************************************//
Route::get('/rw/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_rw'])->name('home.rw');

//****************************************************Pour le rwanda ***********************************************//






//****************************************************Pour le Senegal ***********************************************//
Route::get('/sn/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_sn'])->name('home.sn');

//****************************************************Pour le Senegal ***********************************************//






//****************************************************Pour le Tchad ***********************************************//
Route::get('/td/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_td'])->name('home.td');

//****************************************************Pour le Tchad ***********************************************//
