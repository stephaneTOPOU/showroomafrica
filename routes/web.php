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

Route::get('/annonce',[App\Http\Controllers\AnnonceController::class, 'annonce'])->name('annonce');

Route::get('/autocomplete',[App\Http\Controllers\HomeController::class, 'autocompletion'])->name('autocomplete');

Route::get('/rechercher-entreprise', [App\Http\Controllers\HomeController::class, 'recherche'])->name('recherche');

Route::get('/enregistrer-entreprise', [\App\Http\Controllers\AuthController::class, 'entreprise'])->name('entreprise.register');

Route::get('/professionnel', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel'])->name('professionnel');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact');

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'save'])->name('contact.save');

Route::get('/categories', [\App\Http\Controllers\CategoriesController::class, 'categories'])->name('categorie');

Route::get('/entreprise/{souscategorie_id}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise'])->name('entreprise');

Route::post('/entreprise/{entreprise_id}', [\App\Http\Controllers\CommentaireController::class, 'commentaire'])->name('entreprise.commentaire');

Route::get('/entreprise-profil/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise'])->name('entreprise.profil');

Route::post('/entreprise-profil/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'mail'])->name('entreprise.form');

Route::get('/pharmacie', [\App\Http\Controllers\PharmacieController::class, 'pharmacie'])->name('pharmacie');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::post('/ajouter-user', [\App\Http\Controllers\AuthController::class, 'addUser'])->name('user.add');

Route::post('/authentification', [\App\Http\Controllers\AuthController::class, 'authentification'])->name('authenticate');

Route::post('/ajouter-entreprise', [\App\Http\Controllers\ActionEntrepriseController::class, 'addEntreprise'])->name('entreprise.add');

Route::get('/siteweb', [\App\Http\Controllers\ServiceController::class, 'siteweb'])->name('service.siteweb');

//****************************************************end Afrique************************************************//



//****************************************************Pour le Togo***********************************************//
Route::get('/tg/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_tg'])->name('home.tg');

Route::get('/tg/autocomplete/{pays_id}', [App\Http\Controllers\HomeController::class, 'autocompletion_tg'])->name('autocomplete.tg');

Route::get('/tg/rechercher-entreprise/{pays_id}', [App\Http\Controllers\HomeController::class, 'recherche_tg'])->name('recherche.tg');

Route::get('/tg/enregistrer-entreprise/{pays_id}', [\App\Http\Controllers\AuthController::class, 'entreprise_tg'])->name('entreprise.register.tg');

Route::get('/tg/professionnel/{pays_id}', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel_tg'])->name('professionnel.tg');

Route::get('/tg/contact/{pays_id}', [\App\Http\Controllers\ContactController::class, 'contact_tg'])->name('contact.tg');

Route::get('/tg/categories/{pays_id}', [\App\Http\Controllers\CategoriesController::class, 'categories_tg'])->name('categorie.tg');

Route::get('/tg/entreprise/{pays_id}/{souscategorie_id}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise_tg'])->name('entreprise.tg');

Route::get('/tg/entreprise-profil/{pays_id}/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise_tg'])->name('entreprise.tg.profil');

Route::get('/tg/pharmacie/{pays_id}', [\App\Http\Controllers\PharmacieController::class, 'pharmacie_tg'])->name('pharmacie.tg');

Route::get('/tg/login/{pays_id}', [\App\Http\Controllers\AuthController::class, 'login_tg'])->name('login.tg');

Route::get('/tg/logout/{pays_id}', [\App\Http\Controllers\AuthController::class, 'logout_tg'])->name('logout.tg');

Route::post('/tg/ajouter-user/{pays_id}', [\App\Http\Controllers\AuthController::class, 'addUser_tg'])->name('user.tg.add');

Route::post('/tg/authentification/{pays_id}', [\App\Http\Controllers\AuthController::class, 'authentification_tg'])->name('authenticate.tg');

Route::post('/tg/ajouter-entreprise/{pays_id}', [\App\Http\Controllers\ActionEntrepriseController::class, 'addEntreprise'])->name('entreprise.tg.add');

Route::get('/tg/siteweb/{pays_id}', [\App\Http\Controllers\ServiceController::class, 'siteweb_tg'])->name('service.tg.siteweb');

//****************************************************End Pour le Togo***********************************************//



//****************************************************Pour le Bénin***********************************************//
Route::get('/bj/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_bj'])->name('home.bj');

//****************************************************Pour le Bénin***********************************************//



//****************************************************Pour le Burkina faso***********************************************//
Route::get('/bf/{pays_id}', [App\Http\Controllers\HomeController::class, 'index_bf'])->name('home.bf');

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
