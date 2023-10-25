<?php

use App\Models\Categories;
use App\Models\Entreprise;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
    if ($geoipInfo->iso_code == 'TG') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'tg']
        );
    } elseif ($geoipInfo->iso_code == 'BJ') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'bj']
        );
    } elseif ($geoipInfo->iso_code == 'BF') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'bf']
        );
    } elseif ($geoipInfo->iso_code == 'BI') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'bi']
        );
    } elseif ($geoipInfo->iso_code == 'CM') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'cm']
        );
    } elseif ($geoipInfo->iso_code == 'CF') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'cf']
        );
    } elseif ($geoipInfo->iso_code == 'CG') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'cg']
        );
    } elseif ($geoipInfo->iso_code == 'CI') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'ci']
        );
    } elseif ($geoipInfo->iso_code == 'DJ') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'dj']
        );
    } elseif ($geoipInfo->iso_code == 'GA') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'ga']
        );
    } elseif ($geoipInfo->iso_code == 'GN') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'gn']
        );
    } elseif ($geoipInfo->iso_code == 'MG') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'mg']
        );
    } elseif ($geoipInfo->iso_code == 'ML') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'ml']
        );
    } elseif ($geoipInfo->iso_code == 'MR') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'mr']
        );
    } elseif ($geoipInfo->iso_code == 'NE') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'ne']
        );
    } elseif ($geoipInfo->iso_code == 'CD') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'cd']
        );
    } elseif ($geoipInfo->iso_code == 'RW') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'rw']
        );
    } elseif ($geoipInfo->iso_code == 'SN') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'sn']
        );
    } elseif ($geoipInfo->iso_code == 'TD') {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index_pays'],
            ['slug_pays' => 'td']
        );
    } else {
        return redirect()->action(
            [\App\Http\Controllers\HomeController::class, 'index']
        );
    }
});

//Route::redirect('/geoip', '/');


//******************************************Pour l'Afrique***************************************************//
Route::get('/annuaire',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/annuaire/blog',[\App\Http\Controllers\BlogController::class, 'Blog'])->name('blog');

Route::get('/annuaire/cgu',[\App\Http\Controllers\CguController::class, 'Cgu'])->name('cgu');

Route::get('/annuaire/confidentialite',[\App\Http\Controllers\ConfidentialiteController::class, 'Confidentialite'])->name('cp');

Route::get('/annuaire/cookie',[\App\Http\Controllers\CookieController::class, 'Cookie'])->name('cookie');

Route::get('/annuaire/annonce/{slug_annonce}',[\App\Http\Controllers\AnnonceController::class, 'annonce'])->name('annonce');

Route::post('/annuaire/annonce/{slug_annonce}',[\App\Http\Controllers\AnnonceController::class, 'commentaire'])->name('annonce.commentaire');

Route::get('/annuaire/blog/{slug_blog}', [\App\Http\Controllers\BlogController::class, 'BlogDetail'])->name('blog.detail');

Route::get('/annuaire/autocomplete',[\App\Http\Controllers\HomeController::class, 'autocompletion'])->name('autocomplete');

Route::get('/annuaire/rechercher-entreprise', [\App\Http\Controllers\HomeController::class, 'recherche'])->name('recherche');

Route::post('/annuaire/rechercher-entreprise', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.recherche');

Route::post('/annuaire/entreprise-devis', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.entreprise');

Route::get('/annuaire/enregistrer-entreprise', [\App\Http\Controllers\AuthController::class, 'entreprise'])->name('entreprise.register');

Route::get('/annuaire/professionnel', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel'])->name('professionnel');

Route::get('/annuaire/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact');

Route::post('/annuaire/contact', [\App\Http\Controllers\ContactController::class, 'save'])->name('contact.save');

Route::get('/annuaire/pharmacie', [\App\Http\Controllers\PharmacieController::class, 'pharmacie'])->name('pharmacie');

Route::get('/annuaire/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::get('/annuaire/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::post('/annuaire/ajouter-user', [\App\Http\Controllers\AuthController::class, 'addUser'])->name('user.add');

Route::post('/annuaire/authentification', [\App\Http\Controllers\AuthController::class, 'authentification'])->name('authenticate');

Route::post('/annuaire/ajouter-entreprise', [\App\Http\Controllers\ActionEntrepriseController::class, 'addEntreprise'])->name('entreprise.add');

Route::get('/annuaire/service-siteweb', [\App\Http\Controllers\ServiceController::class, 'siteweb'])->name('service.siteweb');

Route::get('/annuaire/categorie', [\App\Http\Controllers\CategoriesController::class, 'categories'])->name('categorie');

Route::get('/annuaire/categorie/{slug_categorie}', [\App\Http\Controllers\SousCategoriesController::class, 'Souscategories'])->name('subcat');

Route::get('/annuaire/{slug_categorie}/{slug_souscategorie}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise'])->name('entreprise');

Route::post('/annuaire/{slug_souscategorie}/{slug_entreprise}', [\App\Http\Controllers\CommentaireController::class, 'commentaire'])->name('entreprise.commentaire');

Route::get('/annuaire/{slug_categorie}/{slug_souscategorie}/{slug_entreprise}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise'])->name('entreprise.profil');

Route::post('/annuaire/{slug_categorie}/{slug_souscategorie}/{slug_entreprise}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'mail'])->name('entreprise.form');

//****************************************************end Afrique***************************************************************************************//




/*********************************************************generer les liens*************************************************************************************** */
Route::get('genrate-sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // add items to the sitemap (url, date, priority, freq)
    $sitemap->add(URL::to('home'), '2023-09-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('devis.entreprise'), '2023-09-26T12:30:00+02:00', '0.9', 'monthly');

    // get all posts from db
    $entreprises = Entreprise::all();

    // add every post to the sitemap
    foreach ($entreprises as $entreprise)
    {
        $sitemap->add(URL::to('entreprises/'.$entreprise->slug_entreprise.'/edit'), $entreprise->updated_at, '1.0', 'daily');
    }

    // generate your sitemap (format, filename)
    $sitemap->store('xml', 'sitemap');
    // this will generate file mysitemap.xml to your public folder

    return redirect(url('sitemap.xml'));
});

/*********************************************************End generer les liens*************************************************************************************** */



//****************************************************************Pour les pays********************************************************************//
Route::get('/{slug_pays}', [\App\Http\Controllers\HomeController::class, 'index_pays'])->name('home.pays');

Route::get('/{slug_pays}/autocomplete', [\App\Http\Controllers\HomeController::class, 'autocompletion_pays'])->name('autocomplete.pays');

Route::get('/{slug_pays}/rechercher-entreprise', [\App\Http\Controllers\HomeController::class, 'recherche_pays'])->name('recherche.pays');

Route::post('/{slug_pays}/rechercher-entreprise', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.pays.recherche');

Route::get('/{slug_pays}/enregistrer-entreprise', [\App\Http\Controllers\AuthController::class, 'entreprise_pays'])->name('entreprise.register.pays');

Route::get('/{slug_pays}/professionnel', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel_pays'])->name('professionnel.pays');

Route::get('/{slug_pays}/contact', [\App\Http\Controllers\ContactController::class, 'contact_pays'])->name('contact.pays');

Route::get('/{slug_pays}/liste-pharmacie-de-garde', [\App\Http\Controllers\PharmacieController::class, 'pharmacie_pays'])->name('pharmacie.pays');

Route::get('/{slug_pays}/login', [\App\Http\Controllers\AuthController::class, 'login_pays'])->name('login.pays');

Route::get('/{slug_pays}/logout', [\App\Http\Controllers\AuthController::class, 'logout_pays'])->name('logout.pays');

Route::post('/{slug_pays}/ajouter-user', [\App\Http\Controllers\AuthController::class, 'addUser_pays'])->name('user.pays.add');

Route::post('/{slug_pays}/authentification', [\App\Http\Controllers\AuthController::class, 'authentification_pays'])->name('authenticate.pays');

Route::post('/{slug_pays}/ajouter-entreprise', [\App\Http\Controllers\ActionEntrepriseController::class, 'addEntreprise'])->name('entreprise.pays.add');

Route::get('/{slug_pays}/service-siteweb', [\App\Http\Controllers\ServiceController::class, 'siteweb_pays'])->name('service.pays.siteweb');

Route::get('/{slug_pays}/categorie', [\App\Http\Controllers\CategoriesController::class, 'categories_pays'])->name('categorie.pays');

Route::post('/{slug_pays}/entreprise-devis', [\App\Http\Controllers\DevisController::class, 'devis'])->name('devis.pays.entreprise');

Route::get('/{slug_pays}/{slug_categorie}', [\App\Http\Controllers\SousCategoriesController::class, 'Souscategories_pays'])->name('subcat.pays');

Route::get('/{slug_pays}/{slug_categorie}/{slug_souscategorie}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise_pays'])->name('entreprise.pays');

Route::get('/{slug_pays}/{slug_categorie}/{slug_souscategorie}/{slug_entreprise}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise_pays'])->name('entreprise.pays.profil');

Route::post('/{slug_pays}/{slug_categorie}/{slug_souscategorie}/{slug_entreprise}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'mail'])->name('entreprise.pays.form');

//***************************************************************End Pour les pays**************************************************************//


