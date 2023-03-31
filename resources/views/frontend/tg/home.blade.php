@include('frontend.tg.header.header')
@include('frontend.tg.header.header1')
@include('frontend.tg.header.header2')
@include('frontend.tg.header.header3')

    <link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/side-slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/carousel.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/video-player.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/autocompletion.css') }}" />

@include('frontend.tg.header.header4')
@include('frontend.tg.header.header5')
@include('frontend.tg.header.header6')
@include('frontend.tg.header.header7')
@include('frontend.tg.header.header8')
@include('frontend.tg.header.header9')

@include('frontend.tg.navbar')

<!-- autocompletion-->

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Fin autocompletion-->


<!-- POPUP -->
<div id="popup" class="modal">
    <!-- popup content -->
    <div class="modal-content">
        <span class="close" id="closepop"><i class="fa-regular fa-xmark"></i></span>
        @foreach ($popups as $popup)
            <div class="popup-container">
                <img src="{{ asset('assets/images') }}/{{ $popup->image }}" alt="PUB">
            </div>
        @endforeach
    </div>

</div>
<!-- END POPUP -->


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
            <form action="{{ route('recherche.tg',['pays_id'=>14]) }}" method="GET" class="search-form">
                <div class="search-field">
                    <input id="searchfield" type="text" placeholder="Rechercher une entreprise ou un professionnel"
                    name="nom">
                    <i id="searchicon" class="fa-light fa-buildings"></i>
                </div>
                <script type="text/javascript">
                    var path = "{{ route('autocomplete.tg',['pays_id'=>14]) }}" ;
                    // path = path.replace(':pays_id', pays_id);

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
        <br />
        <br />
    </div>
    <!-- END BANNER -->

    <!-- ADS BIG SLIDER -->
    <div class="img-slider first-slider">
        <div class="slide active" data-bs-interval="1">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider1s as $slider1)
        <div class="slide" data-bs-interval="1">
            <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider1->image }}" alt="">
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
                            <img src="{{ asset('assets/images/sliders/side') }}/{{ $sliderLateral->image }}">
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

                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">

                    <div class="slider-slide second">
                        <img src="{{ asset('assets/images/sliders/side/3.jpg') }}">
                    </div>
                    @foreach ($sliderLateralBas as $sliderLateralBa)
                        <div class="slider-slide">
                            <img src="{{ asset('assets/images/sliders/side') }}/{{ $sliderLateralBa->image }}">
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
    <!-- NEWCOMERS -->
    <div class="section-one white-bkg">
        <h1>Ils nous ont rejoint</h1>
        <div class="carousel-container">
            <div class="carousel">
                @foreach ($rejoints as $rejoint)
                    @if ($rejoint->logo)
                        <img src="{{ asset('assets/images/companies/logos') }}/{{ $rejoint->logo }}" alt="{{ $rejoint->nom }}" />
                    @else
                        <div class="carousel-text"> <b>{{ $rejoint->nom }}</b></div>
                    @endif
                @endforeach
            </div>
            <div class="carousel">
                @foreach ($rejoints as $rejoint)
                    @if ($rejoint->logo)
                        <img src="{{ asset('assets/images/companies/logos') }}/{{ $rejoint->logo }}" alt="{{ $rejoint->nom }}" />
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
                        <video class="hide" muted src="{{ asset('assets/videos') }}/{{ $minispot->video }}" controls
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

    <!-- ADS BIG SLIDER 2 -->
    <div class="img-slider">
        <div class="slide-two active">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider2s as $slider2)
        <div class="slide-two">
            <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider2->image }}" alt="">
        </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 2 -->

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
        <br />
        <br />
        <br />
        <div class="category-link" style="text-align: center">
            <a href="{{ route('pharmacie.tg',['pays_id'=>14]) }}">
                <i class="fa-regular fa-plus"></i>
                Liste des pharmacie de garde
            </a>
        </div>
        {{-- <p style="text-align: center"><a href="{{ route('pharmacie') }}">Liste des pharmacie de garde</a></p> --}}
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

    <!-- ADS BIG SLIDER 3 -->
    <div class="img-slider">
        <div class="slide-three active">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider3s as $slider3)
        <div class="slide-three">
            <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider3->image }}" alt="">
        </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 3 -->

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
@include('frontend.tg.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.tg.footer.footer1')
<script src="{{ asset('assets/js/video-modal.js') }}"></script>
@include('frontend.tg.footer.footer2')
<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/autocompletion.js') }}"></script>

<script type="text/javascript">
    var counter = 1;
    var count = 1;
    const sliderInterval = setInterval(sliderTimer, 10000);

    function sliderTimer() {
        var radio = document.getElementById('rdo' + count);
        radio.checked = true;
        count++;
        if (count > 2) {
            count = 1;
        }
    }

    setInterval(function () {
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if (counter > 2) {
            counter = 1;
        }
    }, 12000);

</script>

<script type="text/javascript">

    var text = document.getElementById("searchfield");
    var icon = document.getElementById("searchicon");
    var ai = document.getElementById("annuaire_i");
    var a = document.getElementById("annuaire");

    function changeText() {
        text.placeholder = "Rechercher avec un numéro de téléphone";
        ai.classList.add("btn-active");
        a.classList.remove("btn-active");
        icon.classList.remove("fa-buildings");
        icon.classList.add("fa-phone");
    }
    function resetText() {
        text.placeholder = "Rechercher une entreprise ou un professionnel";
        a.classList.add("btn-active");
        ai.classList.remove("btn-active");
        icon.classList.remove("fa-phone");
        icon.classList.add("fa-buildings");
    }

    /* Popup */
    var pop = document.getElementById("popup");
    var cp = document.getElementById("closepop");

    function loadPopup() {
        pop.style.display = "block";
    }

    cp.onclick = function () {
        pop.style.display = "none";
    }
       /* End Popup */

</script>
@include('frontend.tg.footer.footer3')