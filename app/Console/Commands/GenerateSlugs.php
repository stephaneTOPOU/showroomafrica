<?php

namespace App\Console\Commands;

use App\Models\Annonce;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Entreprise;
use App\Models\Pays;
use App\Models\SousCategories;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class GenerateSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slug:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for existing records';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pays = Pays::all();

        foreach ($pays as $pay) {

            $baseSlug = Str::slug($pay->iso);

            $count = 1;

            // Check if the slug already exists in the database
            while (Pays::where('slug_pays', $baseSlug)->where('id', '!=', $pay->id)->exists()) {
                $baseSlug = Str::slug($pay->iso) . '-' . $count;
                $count++;
            }

            $pay->update(['slug_pays' => $baseSlug]);

        }

        $categories = Categories::all();

        foreach ($categories as $categorie) {

            $baseSlug = Str::slug($categorie->libelle);

            $count = 1;

            // Check if the slug already exists in the database
            while (Categories::where('slug_categorie', $baseSlug)->where('id', '!=', $categorie->id)->exists()) {
                $baseSlug = Str::slug($categorie->libelle) . '-' . $count;
                $count++;
            }

            $categorie->update(['slug_categorie' => $baseSlug]);

        }

        $souscategories = SousCategories::all();

        foreach ($souscategories as $souscategorie) {

            $baseSlug = Str::slug($souscategorie->libelle);

            $count = 1;

            // Check if the slug already exists in the database
            while (SousCategories::where('slug_souscategorie', $baseSlug)->where('id', '!=', $souscategorie->id)->exists()) {
                $baseSlug = Str::slug($souscategorie->libelle) . '-' . $count;
                $count++;
            }

            $souscategorie->update(['slug_souscategorie' => $baseSlug]);

        }

        $entreprises = Entreprise::all();

        foreach ($entreprises as $entreprise) {

            $baseSlug = Str::slug($entreprise->nom);

            $count = 1;

            // Check if the slug already exists in the database
            while (Entreprise::where('slug_entreprise', $baseSlug)->where('id', '!=', $entreprise->id)->exists()) {
                $baseSlug = Str::slug($entreprise->nom) . '-' . $count;
                $count++;
            }

            $entreprise->update(['slug_entreprise' => $baseSlug]);

        }

        $users = User::all();

        foreach ($users as $user) {

            $baseSlug = Str::slug($user->name);

            $count = 1;

            // Check if the slug already exists in the database
            while (User::where('slug_user', $baseSlug)->where('id', '!=', $user->id)->exists()) {
                $baseSlug = Str::slug($user->name) . '-' . $count;
                $count++;
            }

            $user->update(['slug_user' => $baseSlug]);

        }

        $annonces = Annonce::all();

        foreach ($annonces as $annonce) {

            $baseSlug = Str::slug($annonce->titre);

            $count = 1;

            // Check if the slug already exists in the database
            while (Annonce::where('slug_annonce', $baseSlug)->where('id', '!=', $annonce->id)->exists()) {
                $baseSlug = Str::slug($annonce->titre) . '-' . $count;
                $count++;
            }

            $annonce->update(['slug_annonce' => $baseSlug]);

        }

        $blogs = Blog::all();

        foreach ($blogs as $blog) {

            $baseSlug = Str::slug($blog->titre);

            $count = 1;

            // Check if the slug already exists in the database
            while (Blog::where('slug_blog', $baseSlug)->where('id', '!=', $blog->id)->exists()) {
                $baseSlug = Str::slug($blog->titre) . '-' . $count;
                $count++;
            }

            $blog->update(['slug_blog' => $baseSlug]);

        }

        $this->info('Slugs generated for existing records.');
    }
}
