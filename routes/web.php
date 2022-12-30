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

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/rechercher-entreprise', [App\Http\Controllers\HomeController::class, 'recherche'])->name('recherche');

Route::get('/enregistrer-entreprise', [\App\Http\Controllers\AuthController::class, 'entreprise'])->name('entreprise.register');

Route::get('/professionnel', [\App\Http\Controllers\ProfessionnelController::class, 'professionnel'])->name('professionnel');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact');

Route::get('/categories', [\App\Http\Controllers\CategoriesController::class, 'categories'])->name('categorie');

Route::get('/entreprise/{souscategorie_id}', [\App\Http\Controllers\EntrepriseController::class, 'entreprise'])->name('entreprise');

Route::get('/entreprise-profil/{entreprise_id}', [\App\Http\Controllers\ProfileEntrepriseController::class, 'ProfileEntreprise'])->name('entreprise.profil');