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

//******************************************Pour l'Afrique***************************************************//
Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
Route::get('/tg/{pays_id}',[App\Http\Controllers\HomeController::class, 'index_tg'])->name('home.tg');

Route::get('/tg/autocomplete/{pays_id}',[App\Http\Controllers\HomeController::class, 'autocompletion_tg'])->name('autocomplete.tg');

Route::get('/tg/rechercher-entreprise/{pays_id}', [App\Http\Controllers\HomeController::class, 'recherche_tg'])->name('recherche.tg');

Route::get('/tg/enregistrer-entreprise/{pays_id}', [\App\Http\Controllers\AuthController::class, 'entreprise_tg'])->name('entreprise.register.tg');

Route::get('/tg/professionnel/{pays_id}', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel_tg'])->name('professionnel.tg');

