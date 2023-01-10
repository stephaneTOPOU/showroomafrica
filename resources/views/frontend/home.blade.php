@include('frontend.header')
    <link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/side-slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/carousel.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/video-player.css')}}" />
@include('frontend.navbar')
<!-- CONTAINER-->
<div class="container">

    <!-- BANNER -->
    <div class="sb-container">
        <div class="search-text">
            <h1>Trouvez les meilleurs services & produits aux meilleurs prix en contactant directement les entreprises!
            </h1>
        </div>

        <div class="search-dualbutton">
            <button class="btn btn-active" id="annuaire" onclick="resetText()">Annuaire</button>
            <button class="btn" id="annuaire_i" onclick="changeText()">Annuaire inversé</button>
        </div>

        <div class="search-bar">
            <form action="{{ route('recherche') }}" method="GET" class="search-form">
                <div class="search-field">
                    <input id="searchfield" type="text" placeholder="Rechercher une entreprise ou un professionnel"
                    name="nom">
                    <i id="searchicon" class="fa-light fa-buildings"></i>
                </div>
                {{-- <div class="search-field">
                    <select name="pays" id="pays">
                        <option class="placeholder" value="" disabled selected style="width:100%; overflow-y: scroll;">Pays</option>
                        @foreach ($pays as $pay)
                        <option value="{{ $pay->iso }}">{{ $pay->libelle }}</option>
                        @endforeach
                    </select>
                    <i class="fa-light fa-flag"></i>
                </div>

                <div class="search-field">
                    <select name="ville" id="ville">
                        <option class="placeholder" value="" disabled selected style="width:100%; overflow-y: scroll;">Ville</option>
                        @foreach ($villes as $ville)
                            <option value="{{ $ville->libelle }}">{{ $ville->libelle }}</option>
                        @endforeach
                    </select>
                    <i class="fa-light fa-city"></i>
                </div> --}}

                <div class="search-field">
                    <select class="form-select" name="secteur" id="secteur">
                        <option class="placeholder" value="" disabled selected style="width:100%; overflow-y: scroll;">Secteur d'activités</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->libelle }}">{{ $categorie->libelle }}</option>
                        @endforeach
                    </select>
                    <i class="fa-light fa-briefcase"></i>
                </div>

                <button type="submit" class="search-button">
                    <i class="fa-solid fa-search"></i>
                    Trouver
                </button>
            </form>
        </div>
    </div>
    <!-- END BANNER -->

    <!-- ADS BIG SLIDER -->
    <div class="img-slider">
        <div class="slide active" data-bs-interval="1">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider1s as $slider1)
        <div class="slide" data-bs-interval="1">
            <img src="{{ asset('assets/images/sliders') }}/{{ $slider1->image }}" alt="">
        </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER -->

    <div class="section-one">
        <div class="categories">
            <h2 class="section-title">Secteurs d'activité</h2>

            <div class="categories-block">
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-bullhorn"></i>
                        <p>Communication & Publicité</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-person-digging"></i>
                        <p>Bâtiments & Constructions</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-user-tie"></i>
                        <p>Administrations</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-car"></i>
                        <p>Automobiles</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-tower-broadcast"></i>
                        <p>Télécoms & Téléphonie</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-scale-balanced"></i>
                        <p>Comptabilité & Conseils juridiques</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-buildings"></i>
                        <p>Immobilier</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-island-tropical"></i>
                        <p>Tourisme & Loisirs</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-shop"></i>
                        <p>Commerce</p>
                    </a>
                </div>
            </div>

            <div class="category-link">
                <a href="{{ route('categorie') }}">
                    <i class="fa-regular fa-plus"></i>
                    Voir tous les secteurs d'activité
                </a>
            </div>

        </div>

        <div class="advertising">
            <!-- SLIDER 1-->
            <div class="slider">
                <div class="slides">

                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">

                    <div class="slider-slide first">
                        <img src="{{ asset('assets/images/sliders/side/1.jpg') }}">
                    </div>
                    @foreach ($sliderLaterals as $sliderLateral)
                        <div class="slider-slide">
                            <img src="{{ asset('assets/images/sliders') }}/{{ $sliderLateral->image }}">
                        </div>
                    @endforeach
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                    </div>

                </div>
            </div>

            <!-- SLIDER 2-->
            <div class="slider">
                <div class="slides">

                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <div class="slider-slide first">
                        <img src="{{ asset('assets/images/sliders/side/3.jpg') }}">
                    </div>
                    @foreach ($sliderLateralBas as $sliderLateralBa)
                        <div class="slider-slide">
                            <img src="{{ asset('assets/images/sliders') }}/{{ $sliderLateralBa->image }}">
                        </div>
                    @endforeach
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <!-- ADS BIG SLIDER -->
    <div class="img-slider">
        <div class="slide active">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider2s as $slider2)
        <div class="slide">
            <img src="{{ asset('assets/images/sliders') }}/{{ $slider2->image }}" alt="">
        </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER -->

    <!-- NEWCOMERS -->
    <div class="section-one white-bkg">
        <h1>Ils nous ont rejoint</h1>
        <div class="carousel-container">
            <div class="carousel">
                @foreach ($rejoints as $rejoint)
                    @if ($rejoint->logo)
                        <img src="{{ asset('assets/images/companies') }}/{{ $rejoint->logo }}" alt="{{ $rejoint->nom }}" />
                    @else
                        <div class="carousel-text"> <b>{{ $rejoint->nom }}</b></div>
                    @endif
                @endforeach
            </div>
            <div class="carousel">
                @foreach ($rejoints as $rejoint)
                    @if ($rejoint->logo)
                        <img src="{{ asset('assets/images/companies') }}/{{ $rejoint->logo }}" alt="{{ $rejoint->nom }}" />
                    @else
                        <div class="carousel-text"> <b>{{ $rejoint->nom }}</b></div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- END NEWCOMERS -->

    <!-- SPOTS -->
    <div class="section-one">
        <h1>Mini-Spots</h1>
        <div class="row">
            @foreach ($minispots as $minispot)
                <div class="video-list">
                    <div class="video-list-inner video">
                        <img class="play" src="{{ asset('assets/videos') }}/{{ $minispot->image }}">
                        <div class="play">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                        <video class="hide" muted src="{{ asset('assets') }}/{{ $minispot->video }}" controls
                            poster="{{ asset('assets/videos') }}/{{ $minispot->image }}">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="video-container">
            <i class="fa-solid fa-circle-xmark close"></i>
            <video src="" autoplay controls poster=""></video>
        </div>

    </div>
    <!-- END SPOTS -->

    <!-- REPORTAGE -->
    <div class="section-one blue-bkg">
        <h1>Reportage</h1>
        @foreach ($reportages as $reportage)
            <iframe class="youtube-video" src="{{ $reportage->video }}"
                title="Découvrons {{ $reportage->libelle }}" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        @endforeach
    </div>
    <!-- END REPORTAGE -->
    <!-- HIGHLIGHTED COMPANIES -->
    <div class="section-one">
        <h1>Entreprises du mois</h1>
            <div class="highlights">
                @foreach ($honeures as $honeure)
                    <div class="hightlighted-company">
                        <img src="{{ asset('assets/images') }}/{{ $honeure->photo4 }}" alt="{{ $honeure->nom }}">
                        <div class="highlight-links">
                        <button type="button">
                            <i class="fa-regular fa-plus"></i>
                            <a href="{{ route('entreprise.profil',['entreprise_id'=>$honeure->id]) }}">Découvrir</a>
                        </button>
                        <button type="button">
                            <i class="fa-regular fa-phone"></i>
                            <a href="tel:{{ $honeure->telephone1 }}">Contacter</a>
                        </button>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
    <!-- END HIGHLIGHTED COMPANIES -->
    <!-- ADVERTORIAL -->
    <div class="section-one">
        <h1>Publireportage</h1>
        <div class="advertorials">
            <div class="advertorial">
                <img src="{{ asset('assets/images/advertorial/telephonie.jpg') }}">
                <div class="overlay"></div>
                <a href="#">
                <i class="fa-solid fa-phone"></i> Téléphonie
                </a>
            </div>

            <div class="advertorial">
                <img src="{{ asset('assets/images/advertorial/commerce.jpg') }}">
                <div class="overlay"></div>
                <a href="#">
                <i class="fa-solid fa-shopping-bag"></i> Commerce
                </a>
            </div>

            <div class="advertorial">
                <img src="{{ asset('assets/images/advertorial/education.jpg') }}">
                <div class="overlay"></div>
                <a href="#">
                <i class="fa-solid fa-backpack"></i> Education
                </a>
            </div>

            <div class="advertorial">
                <img src="{{ asset('assets/images/advertorial/medecine.jpg') }}">
                <div class="overlay"></div>
                <a href="#">
                <i class="fa-solid fa-user-doctor"></i> Medecine
                </a>
            </div>

            <div class="advertorial">
                <img src="{{ asset('assets/images/advertorial/alimentation.jpg') }}">
                <div class="overlay"></div>
                <a href="#">
                <i class="fa-solid fa-utensils"></i>Alimentation</span>
                </a>
            </div>

            <div class="advertorial">
                <img src="{{ asset('assets/images/advertorial/divers.jpg') }}">
                <div class="overlay"></div>
                <a href="#">
                <i class="fa-solid fa-arrow-right"></i> Divers</span>
                </a>
            </div>

        </div>
    </div>
    <!-- END ADVERTORIAL -->
    <!-- TOWER -->
    <div class="section-one">
        <h1>Pharmacies de garde</h1>
        <div class="tower-ctn">
            @foreach ($pharmacies as $pharmacie)
                <div class="drugstore">
                    <img src="{{ asset('assets/images') }}/{{ $pharmacie->photo1 }}">
                    <h3>{{ $pharmacie->nom }}</h3>
                    <ul>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        {{ $pharmacie->adresse }}
                    </li>
                    <li><i class="fa-solid fa-phone"></i> (+228) <b>{{ $pharmacie->telephone1 }}</b></li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
    <!-- END TOWER -->

    <!-- STATISTICS -->
    @php
        function pretty_number(int $n): string {
        $prettyN = $n;
        $suffix = '';
        $len = strlen((string) $n);
        $suffixes = ['K', 'M'];
        foreach ($suffixes as $s) {
            if ($n < 1000) {
                break;
            }
            $suffix = $s;
            $n = $n / 1000;
            $prettyN = number_format($n, 1);
        }
        return $prettyN . $suffix;
    }
    @endphp                                         

    {{-- <script>
        let buttonHome = document.querySelector(".button-home");
        var CountButtonHomeClicks = 0;

        buttonHome.addEventListener("click", function() {
        CountButtonHomeClicks += 1;
        
        console.log('click : ',CountButtonHomeClicks);

        $.get("{{ route('home') }}", CountButtonHomeClicks)
        });
    </script>

    <script>
        let buttonHome = document.querySelector(".button-home");
        let CountButtonHomeClicks = 0;

        $(".button-home").click(function(e){
            $count = CountButtonHomeClicks += 1;        
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
        url: "{{ route('home') }}",
            type: 'POST',
            data: {
                data: {messageValue: $count}, 
            }
        });
    });
    </script> --}}

    <div class="section-one">
        <h1>Le mois dernier</h1>
        <div class="statistics">
        <div class="statistic-detail">
            <label class="statistic-title">Total vue</label>
            @foreach ($visiteur2 as $visiteur)
                <div>
                    <label class="statistic-score">@php echo pretty_number(($visiteur->visiteur) + 20000)@endphp</label>
                    <span><b>+ 10</b>%</span>
                </div>
            @endforeach
            
        </div>
        <div class="statistic-detail">
            <label class="statistic-title">Total inscrit</label>
            <div>
                <label class="statistic-score">@php echo pretty_number($inscrit + 10000)@endphp</label>
                <span><b>+ 10</b>%</span>
            </div>
        </div>
        <div class="statistic-detail">
            <label class="statistic-title">Entreprises</label>
            <div>
                <label class="statistic-score">@php echo pretty_number( $nombresEntreprise + 10000)@endphp</label>
                <span><b>+ 5</b>%</span>
            </div>
        </div>

        </div>
    </div>
    <!-- END STATISTICS -->
    <!-- MAGAZINES -->
    <div class="section-one white-bkg">
        <h1>Magazines</h1>
        <div class="magazines">
            @foreach ($magazines as $magazine)
            <div class="magazine">
                <div class="magazine-details">
                    <img class="magazine-img" src="{{ asset('assets/images') }}/{{ $magazine->magazineimage1 }}">
                    <button type="button" class="discover-btn">
                        <a href="{{ route('entreprise.profil',['entreprise_id'=>$magazine->id]) }}"><i class="fa-light fa-plus"></i> Découvrir</a>
                    </button>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    <!-- END MAGAZINES -->
</div>
<!-- END CONTAINER-->

<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/slider.js') }}"></script>
@include('frontend.footer')