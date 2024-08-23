<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Contracts\JsonLd;
use Artesaos\SEOTools\Contracts\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class SeoController extends Controller
{
    use SEOMeta;
    use OpenGraph;
    use JsonLd;
    
    public function index(){

        SEOTools::setTitle(env('SEO_META_TITLE'));
        SEOTools::setDescription('Bienvenue sur le site officiel de Showroom Africa, votre annuaire qui répertorie toutes les entreprises africaines....');
        SEOTools::opengraph()->setUrl('https://showroomafrica.com');
        SEOTools::setCanonical('https://showroomafrica.com');
        SEOTools::opengraph()->addProperty('type', 'annuaire');
        SEOTools::twitter()->setSite('@annuaireafrique');
        SEOTools::jsonLd()->addImage('https://showroomafrica.com/assets/images/showroom/logo.png');

        $posts = Post::all();

        return view('frontend.home', compact('posts'));
    }

    public function show($id){

        $post = Post::find($id);

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->resume);
        SEOMeta::addMeta('annuaire:published_time', $post->published_date->toW3CString(), 'property');
        SEOMeta::addMeta('annuaire:section', $post->category, 'property');
        SEOMeta::addKeyword(['annuaire', 'annuaire showroom', 'annuaire afrique']);

        OpenGraph::setDescription($post->resume);
        OpenGraph::setTitle($post->title);
        OpenGraph::setUrl('https://showroomafrica.com');
        OpenGraph::addProperty('type', 'annuaire');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage($post->cover->url);
        OpenGraph::addImage($post->images->list('url'));
        OpenGraph::addImage(['url' => 'https://showroomafrica.com/assets/images/sliders/main/4.jpg', 'size' => 300]);
        OpenGraph::addImage('https://showroomafrica.com/assets/images/sliders/main/4.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($post->title);
        JsonLd::setDescription($post->resume);
        JsonLd::setType('annuaire');
        JsonLd::addImage($post->images->list('url'));


        // Namespace URI: http://ogp.me/ns/article#
        // article
        OpenGraph::setTitle('Article')
            ->setDescription('Some Article')
            ->setType('article')
            ->setArticle([
                'published_time' => 'datetime',
                'modified_time' => 'datetime',
                'expiration_time' => 'datetime',
                'author' => 'profile / array',
                'section' => 'string',
                'tag' => 'string / array'
            ]);

        // Namespace URI: http://ogp.me/ns/book#
        // book
        OpenGraph::setTitle('Book')
            ->setDescription('Some Book')
            ->setType('book')
            ->setBook([
                'author' => 'profile / array',
                'isbn' => 'string',
                'release_date' => 'datetime',
                'tag' => 'string / array'
            ]);

        // Namespace URI: http://ogp.me/ns/profile#
        // profile
        OpenGraph::setTitle('Profile')
             ->setDescription('Some Person')
            ->setType('profile')
            ->setProfile([
                'first_name' => 'string',
                'last_name' => 'string',
                'username' => 'string',
                'gender' => 'enum(male, female)'
            ]);

        // Namespace URI: http://ogp.me/ns/music#
        // music.song
        OpenGraph::setType('music.song')
            ->setMusicSong([
                'duration' => 'integer',
                'album' => 'array',
                'album:disc' => 'integer',
                'album:track' => 'integer',
                'musician' => 'array'
            ]);

        // music.album
        OpenGraph::setType('music.album')
            ->setMusicAlbum([
                'song' => 'music.song',
                'song:disc' => 'integer',
                'song:track' => 'integer',
                'musician' => 'profile',
                'release_date' => 'datetime'
            ]);

         //music.playlist
        OpenGraph::setType('music.playlist')
            ->setMusicPlaylist([
                'song' => 'music.song',
                'song:disc' => 'integer',
                'song:track' => 'integer',
                'creator' => 'profile'
            ]);

        // music.radio_station
        OpenGraph::setType('music.radio_station')
            ->setMusicRadioStation([
                'creator' => 'profile'
            ]);

        // Namespace URI: http://ogp.me/ns/video#
        // video.movie
        OpenGraph::setType('video.movie')
            ->setVideoMovie([
                'actor' => 'profile / array',
                'actor:role' => 'string',
                'director' => 'profile /array',
                'writer' => 'profile / array',
                'duration' => 'integer',
                'release_date' => 'datetime',
                'tag' => 'string / array'
            ]);

        // video.episode
        OpenGraph::setType('video.episode')
            ->setVideoEpisode([
                'actor' => 'profile / array',
                'actor:role' => 'string',
                'director' => 'profile /array',
                'writer' => 'profile / array',
                'duration' => 'integer',
                'release_date' => 'datetime',
                'tag' => 'string / array',
                'series' => 'video.tv_show'
            ]);

        // video.tv_show
        OpenGraph::setType('video.tv_show')
            ->setVideoTVShow([
                'actor' => 'profile / array',
                'actor:role' => 'string',
                'director' => 'profile /array',
                'writer' => 'profile / array',
                'duration' => 'integer',
                'release_date' => 'datetime',
                'tag' => 'string / array'
            ]);

        // video.other
        OpenGraph::setType('video.other')
            ->setVideoOther([
                'actor' => 'profile / array',
                'actor:role' => 'string',
                'director' => 'profile /array',
                'writer' => 'profile / array',
                'duration' => 'integer',
                'release_date' => 'datetime',
                'tag' => 'string / array'
            ]);

        // og:video
        OpenGraph::addVideo('http://example.com/movie.swf', [
                'secure_url' => 'https://example.com/movie.swf',
                'type' => 'application/x-shockwave-flash',
                'width' => 400,
                'height' => 300
            ]);

        // og:audio
        OpenGraph::addAudio('http://example.com/sound.mp3', [
                'secure_url' => 'https://secure.example.com/sound.mp3',
                'type' => 'audio/mpeg'
            ]);

        // og:place
        OpenGraph::setTitle('Place')
             ->setDescription('Some Place')
            ->setType('place')
            ->setPlace([
                'location:latitude' => 'float',
                'location:longitude' => 'float',
            ]);


    }
}
