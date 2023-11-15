@include('frontend.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/annuaire/rechercher-entreprise" />
<link rel="canonical" href="https://www.showroomafrica.com/annuaire/rechercher-entreprise" />
@include('frontend.header.header1')
@include('frontend.header.header2')
<link rel="stylesheet" href="{{ asset('assets/css/devis-modal.css') }}" />
@include('frontend.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/search.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/companies.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('assets/css/vertical-carousel.css') }}" /> --}}
<link rel="stylesheet" href="{{ asset('assets/css/autocompletion.css') }}" />

@include('frontend.header.header4')
@include('frontend.header.header5')
@include('frontend.header.header6')
@include('frontend.header.header7')
@include('frontend.header.header8')
@include('frontend.header.header9')

@include('frontend.navbar')
<div class="container">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- ADS BIG SLIDER -->
    <div class="img-slider first-slider">
        <div class="slide active">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="showroom africa">
        </div>
        @foreach ($slider as $sliders)
            <div class="slide">
                <img src="{{ asset('assets/images/sliders/search') }}/{{ $sliders->image }}" alt="{{ $sliders->image }}" />
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER -->
    <!-- ADS BIG SLIDER 2 -->
    <div class="img-slider" hidden>
        <div class="slide-two active-two">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="showroom africa">
        </div>
        @foreach ($slider as $slider2)
            <div class="slide-two">
                <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider2->image }}" alt="{{ $slider2->image }}" />
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 2 -->

    <!-- ADS BIG SLIDER 3 -->
    <div class="img-slider" hidden>
        <div class="slide-three active-three">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="showroom africa">
        </div>
        @foreach ($slider as $slider3)
        <div class="slide-three">
            <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider3->image }}" alt="{{ $slider3->image }}">
        </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 3 -->

    <div class="companies-container">

        <div class="search-bar" style="margin-bottom:2em;">
            <form action="{{ route('recherche') }}" autocomplete="off" class="search-form" method="GET">
                <div class="search-field autocomplete">
                    <input id="searchfield" type="text" placeholder="Rechercher une entreprise ou un professionnel" required="" name="nom">
                    <i id="searchicon" class="fa-light fa-buildings"></i>
                </div>

                <script type="text/javascript">
                    var path = "{{ route('autocomplete') }}";
                    $( "#searchfield" ).autocomplete({
                        source: function( request, response ) {
                            $.ajax({
                            url: path,
                            type: 'GET',
                            dataType: "json",
                            data: {
                                searchfield: request.term
                            },
                            success: function( data ) {
                                response( data );
                            }
                            });
                        },
                        select: function (event, ui) {
                            $('#searchfield').val(ui.item.label);
                            console.log(ui.item); 
                            return false;
                        }
                        });
                </script>
                <style>
                    .ui-menu {
                        background: #fff;
                        padding: .5em;
                        border-radius: 1em;
                        margin: .5em;
                        box-shadow: 2px 4px 12px -2px rgb(0 0 0 / 36%);
                        position: absolute;
                    }
                    .ui-menu-item {
                        border: none;
                        border-radius: 1em;
                        outline: none;
                        padding: .5em;
                        margin: .5em;
                    }
                </style>

                <button type="submit" class="search-button">
                    <i class="fa-solid fa-search"></i>
                    Trouver
                </button>
            </form>
        </div>
        
        <div class="search-bar" style="margin-bottom:2em;">
            <form class="search-form">
                <style>
                    #devisbtn{
                        /* background-color: #073465 !important; */
                        width: auto;
                    }
                </style>

                <a class="search-button" id="devisbtn">
                    Demande de devis
                </a>
            </form>
        </div>

        <!-- MODAL -->
        <div id="devismodal" class="devis-modal">
            <!-- Modal content -->
            <div class="contact devis-modal-content">
                <span class="close" id="closedevis"><i class="fa-regular fa-xmark"></i></span>
                <span class="titre">Demande de devis</span>
                <div><h4>Demande de devis sans engagement de votre part</h4></div>
                @if(Session::has('succes'))
                    <div class="alert alert-success" role="alert">{{Session::get('succes') }}</div>
                @endif
                <form action="{{ route('devis.recherche') }}" method="POST">
                    @csrf
                    <div class="select-box">
                        <select name="souscategorie_id" id="souscategorie_id">
                            <option class="placeholder" value="" disabled selected>Secteur d'activité</option>
                            @foreach ($subcat as $souscategorie)
                                <option value="{{ $souscategorie->id }}">{{ $souscategorie->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-box">
                        <select name="type_demande" id="type_demande">
                            <option class="placeholder" value="" disabled selected>Type de demande</option>
                            <option value="Demande d'information">Demande d'information</option>
                            <option value="Demande de produits">Demande de produits</option>
                            <option value="Demande de services">Demande de services</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Ville" required name="ville" required>
                    </div>
                    <div class="input-box">
                        <input class="nom" type="text" placeholder="Nom" required name="nom" required>
                        <input class="prenom" type="text" placeholder="Prenoms" required name="prenom" required>
                    </div>
                    <div class="input-box">
                        <input type="email" placeholder="Votre e-mail" required name="email" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Téléphone" required name="telephone">
                    </div>
                    <div class="input-box message-box">
                        <textarea placeholder="Votre devis" required name="demande" required></textarea>
                    </div>
                    <div class="button">
                        <input type="submit" value="Envoyer" id="envoibtn">
                    </div>
                </form>
            </div>
        </div>
        <!-- END MODAL -->


        <div class="companies-list">
            <div class="companies">
                @foreach ($recherches as $key => $recherche)
                    @if ($loop->iteration % 10 === 0)
                        <div class="company-slider" style="display: flex; flex-flow: row wrap; margin: 0 15px;">
                            <div class="img-search">
                                <div class="search active">
                                    <img src="{{ asset('assets/images/sliders/main') }}/{{ $search->image }}" alt="{{ $search->image }}">
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="company-info">
                            <div class="left">
                                <div class="header">
                                    <h3 class="company-name"><a href="{{ route('entreprise.profil',['slug_categorie'=>$recherche->slug_categorie, 'slug_souscategorie'=>$recherche->slug_souscategorie, 'slug_entreprise'=>$recherche->slug_entreprise]) }}">{{$recherche->nom}}</a></h3>
                                    <span class="company-category">{{ $recherche->sousCategorie }}</span>
                                    @if ($recherche->premium == 1)
                                        <div class="premium">
                                            <span><i class="fa-regular fa-gem"></i> PREMIUM</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="contacts">
                                    <ul>
                                        @if ($recherche->adresse)
                                            <li>
                                                <i class="fa-light fa-location-dot"></i>
                                                {{ $recherche->adresse }}
                                            </li>
                                        @endif
                                        
                                        @if ($recherche->telephone1)
                                            <li><i class="fa-light fa-phone"></i>@if ($recherche->slug_pays == 'tg')
                                                            (+228) 
                                                        @elseif ($recherche->slug_pays == 'ci')
                                                            (+225)
                                                        @elseif ($recherche->slug_pays == 'ne')
                                                            (+227)
                                                        @elseif ($recherche->slug_pays == 'bf')
                                                            (+226)
                                                        @elseif ($recherche->slug_pays == 'bj')
                                                            (+229)
                                                        @elseif ($recherche->slug_pays == 'cm')
                                                            (+237)
                                                        @elseif ($recherche->slug_pays == 'cf')
                                                            (+236)
                                                        @elseif ($recherche->slug_pays == 'cg')
                                                            (+242)
                                                        @elseif ($recherche->slug_pays == 'dj')
                                                            (+253)
                                                        @elseif ($recherche->slug_pays == 'ga')
                                                            (+241)
                                                        @elseif ($recherche->slug_pays == 'gn')
                                                            (+224)
                                                        @elseif ($recherche->slug_pays == 'mg')
                                                            (+261)
                                                        @elseif ($recherche->slug_pays == 'ml')
                                                            (+223)
                                                        @elseif ($recherche->slug_pays == 'mr')
                                                            (+222)
                                                        @elseif ($recherche->slug_pays == 'cd')
                                                            (+243)
                                                        @elseif ($recherche->slug_pays == 'rw')
                                                            (+250)
                                                        @elseif ($recherche->slug_pays == 'sn')
                                                            (+221)
                                                        @elseif ($recherche->slug_pays == 'td')
                                                            (+235)
                                                        @endif<b>{{ $recherche->telephone1 }}</b>
                                                @if ($recherche->telephone2)
                                                    <b>
                                                        • {{ $recherche->telephone2 }}
                                                    </b>
                                            @endif 
                                        </li>

                                        @endif
                                        
                                        @if ($recherche->siteweb)
                                            <li>
                                                <i class="fa-light fa-globe"></i>
                                                <a href="{{ $recherche->siteweb }}" class="website-link">{{ $recherche->siteweb }}</a>
                                            </li>
                                        @endif
                                        
                                        @if ($recherche->itineraire)
                                        <li><i class="fa-light fa-map-location-dot"></i><a href="{{ $recherche->itineraire }}" class="website-link">Itineraire</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="right">
                                @if ($recherche->logo)
                                    <img src="{{ asset('assets/images/companies/logos')}}/{{ $recherche->logo }}" alt="{{$recherche->nom}}">
                                @endif
                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="top-research">
            <h3>Sociétés les plus recherchées</h3>
            <div class="top-companies">
                @foreach ($entreprisePopulaire as $entreprisePopulair)
                    <div class="top-company-info">
                        <h4><a href="{{ route('entreprise.profil',['slug_categorie'=>$entreprisePopulair->slug_categorie, 'slug_souscategorie'=>$entreprisePopulair->slug_souscategorie, 'slug_entreprise'=>$entreprisePopulair->slug_entreprise]) }}">{{ $entreprisePopulair->nom }}</a></h4>
                        <ul>
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $entreprisePopulair->adresse }}
                            </li>
                            <li><i class="fa-solid fa-phone"></i>@if ($entreprisePopulair->slug_pays == 'tg')
                                (+228) 
                            @elseif ($entreprisePopulair->slug_pays == 'ci')
                                (+225)
                            @elseif ($entreprisePopulair->slug_pays == 'ne')
                                (+227)
                            @elseif ($entreprisePopulair->slug_pays == 'bf')
                                (+226)
                            @elseif ($entreprisePopulair->slug_pays == 'bj')
                                (+229)
                            @elseif ($entreprisePopulair->slug_pays == 'cm')
                                (+237)
                            @elseif ($entreprisePopulair->slug_pays == 'cf')
                                (+236)
                            @elseif ($entreprisePopulair->slug_pays == 'cg')
                                (+242)
                            @elseif ($entreprisePopulair->slug_pays == 'dj')
                                (+253)
                            @elseif ($entreprisePopulair->slug_pays == 'ga')
                                (+241)
                            @elseif ($entreprisePopulair->slug_pays == 'gn')
                                (+224)
                            @elseif ($entreprisePopulair->slug_pays == 'mg')
                                (+261)
                            @elseif ($entreprisePopulair->slug_pays == 'ml')
                                (+223)
                            @elseif ($entreprisePopulair->slug_pays == 'mr')
                                (+222)
                            @elseif ($entreprisePopulair->slug_pays == 'cd')
                                (+243)
                            @elseif ($entreprisePopulair->slug_pays == 'rw')
                                (+250)
                            @elseif ($entreprisePopulair->slug_pays == 'sn')
                                (+221)
                            @elseif ($entreprisePopulair->slug_pays == 'td')
                                (+235)
                            @endif<b>{{ $entreprisePopulair->telephone1 }}</b></li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>

@include('frontend.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/devis-modal.js') }}"></script>
@include('frontend.footer.footer1')
@include('frontend.footer.footer2')

<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>
<script src="{{ asset('assets/js/autocompletion.js') }}"></script>

@include('frontend.footer.footer3')