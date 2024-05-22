@include('frontend.sn.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/sn/rechercher-entreprise" />
<link rel="canonical" href="https://www.showroomafrica.com/sn/rechercher-entreprise" />
@include('frontend.sn.header.header1')
@include('frontend.sn.header.header2')
<link rel="stylesheet" href="{{ asset('assets/css/devis-modal.css') }}" />
@include('frontend.sn.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/search.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/companies.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('assets/css/vertical-carousel.css') }}" /> --}}
<link rel="stylesheet" href="{{ asset('assets/css/autocompletion.css') }}" />


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

@include('frontend.sn.header.header4')
@include('frontend.sn.header.header5')
@include('frontend.sn.header.header6')
@include('frontend.sn.header.header7')
@include('frontend.sn.header.header8')
@include('frontend.sn.header.header9')

@include('frontend.sn.navbar')
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
                <img src="{{ asset('assets/images/sliders/search') }}/{{ $sliders->image }}"
                    alt="{{ $sliders->image }}">
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
                <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider2->image }}"
                    alt="{{ $slider2->image }}">
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
                <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider3->image }}"
                    alt="{{ $slider3->image }}">
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 3 -->

    <div class="companies-container">

        <div class="search-bar" style="margin-bottom:2em;">
            <form action="{{ route('recherche.pays', ['slug_pays' => 'sn']) }}" autocomplete="off" class="search-form"
                method="GET">
                <div class="search-field autocomplete">
                    <input id="searchfield" type="text" placeholder="Rechercher une entreprise ou un professionnel"
                        required="" name="nom">
                    <i id="searchicon" class="fa-light fa-buildings"></i>
                </div>

                <script type="text/javascript">
                    var path = "{{ route('autocomplete.pays', ['slug_pays' => 'sn']) }}";
                    $("#searchfield").autocomplete({
                        source: function(request, response) {
                            $.ajax({
                                url: path,
                                type: 'GET',
                                dataType: "json",
                                data: {
                                    searchfield: request.term
                                },
                                success: function(data) {
                                    response(data);
                                }
                            });
                        },
                        select: function(event, ui) {
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
                    #devisbtn {
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
                <div>
                    <h4>Demande de devis sans engagement de votre part</h4>
                </div>
                @if (Session::has('succes'))
                    <div class="alert alert-success" role="alert">{{ Session::get('succes') }}</div>
                @endif
                <form action="{{ route('devis.pays.recherche', ['slug_pays' => 'sn']) }}" method="POST">
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
                                    <img src="{{ asset('assets/images/sliders/main') }}/{{ $search->image }}"
                                        alt="{{ $search->image }}" />
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="company-info">
                            <div class="left">
                                <div class="header">
                                    <h3 class="company-name">
                                        <a
                                            href="{{ route('entreprise.pays.profil', [
                                                'slug_pays' => $recherche->slug_pays,
                                                'slug_categorie' => $recherche->slug_categorie,
                                                'slug_souscategorie' => $recherche->slug_souscategorie,
                                                'slug_entreprise' => $recherche->slug_entreprise,
                                            ]) }}">
                                            {{ $recherche->nom }}
                                        </a>
                                    </h3>
                                    <span class="company-category">{{ $recherche->sousCategorie }}</span>
                                    @if ($recherche->premium == 1)
                                        <div class="premium">
                                            <span><i class="fa-regular fa-gem"></i> PREMIUM</span>
                                        </div>
                                    @endif
                                    @if ($recherche->pharmacie_de_garde == 1)
                                        <div class="premium">
                                            <span><i class="fa-regular fa-check"></i> <b>Garde</b></span>
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
                                            <li><i class="fa-light fa-phone"></i> (+221)
                                                <b>{{ $recherche->telephone1 }}</b>
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
                                                <a href="{{ $recherche->siteweb }}" class="website-link"
                                                    target="_blank">{{ $recherche->siteweb }}</a>
                                            </li>
                                        @endif

                                        @if ($recherche->itineraire)
                                            <li><i class="fa-light fa-map-location-dot"></i><a
                                                    href="{{ $recherche->itineraire }}"
                                                    class="website-link">Itineraire</a></li>
                                        @endif

                                        @if ($recherche->descriptionCourte)
                                            <li>
                                                {{ $recherche->descriptionCourte }}
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="right">
                                @if ($recherche->premium == 1 || $recherche->basic == 1)
                                    @if ($recherche->logo)
                                        <img src="{{ asset('assets/images/companies/logos') }}/{{ $recherche->logo }}"
                                            alt="{{ $recherche->nom }}">
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endif

                @endforeach
            </div>

        </div>

        <style>
            .top-research {
                top: 6em;
                position: sticky;
                height: fit-content;
            }
        </style>
        <div class="top-research">
            <div class="search">
                @foreach ($tops as $top)
                    <div class="img-div">
                        <img src="{{ asset('assets/images/sliders/search-side') }}/{{ $top->image }}"
                            alt="{{ $top->image }}" style="display: block; width: 50%; margin: auto;"
                            width="100">
                    </div>
                @endforeach
            </div>
            <br />
            <div>
                <img src="{{ asset('assets/images/sliders/search-side') }}/{{ $top2s->image }}"
                    alt="{{ $top2s->image }}" style="display: block; width: 50%; margin: auto;" width="100">
            </div>

        </div>

        {{-- <div class="top-research">
            <h3>Sociétés les plus recherchées</h3>
            <div class="top-companies wrapper">
                <div class="outer">
                    @foreach ($entreprisePopulaire as $entreprisePopulair)
                        <div class="top-company-info card" style="--delay:2;">
                            <h4><a href="#">{{ $entreprisePopulair->nom }}</a></h4>
                            <ul>
                                <li>
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $entreprisePopulair->adresse }}
                                </li>
                                <li><i class="fa-solid fa-phone"></i> (+221) <b>{{ $entreprisePopulair->telephone1 }}</b></li>
                            </ul>
                        </div>
                    @endforeach
                </div>
                </div>
            </div> --}}

    </div>

</div>

{{-- <script>
    // Création de l'élément d'image
    var imageElement = document.createElement('img');
    imageElement.src = '{{ asset('assets/images/sliders/main/4.jpg') }}';
    imageElement.alt = 'showroom africa';

    // Sélection de l'élément où vous souhaitez insérer les images
    var container = document.getElementById('imageContainer');

    // Boucle pour insérer l'image plusieurs fois
    for (var i = 0; i < 5; i++) {
    container.appendChild(imageElement.cloneNode(true));
    }

</script> --}}

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var slider = @json($slider); // Convertir les données PHP en objet JavaScript

        var imageContainer = document.getElementById('imageContainer');

        slider.forEach(function(sliders) {
            var img = document.createElement('img');
            img.src = '{{ asset('assets/images/sliders/main/') }}';
            img.alt = 'showroom africa';
            imageContainer.appendChild(img);
        });
    });
</script> --}}

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var slider = @json($slider); // Convertir les données PHP en objet JavaScript
        var imageContainer = document.getElementById('imageContainer');
        var currentIndex = 0;

        function insertImage() {
            var imageUrl = slider[currentIndex % slider.length];
            
            var img = document.createElement('img');
            img.src = '{{ asset('assets/images/sliders/main/4.jpg') }}';
            img.alt = 'showroom africa';
            imageContainer.appendChild(img);
            
            currentIndex++;
        }

        // Insérer une nouvelle image toutes les 3 secondes
        var intervalId = setInterval(insertImage, 3000);

        // Arrêter l'insertion périodique après un certain nombre d'itérations
        var maxIterations = 10;
        var currentIteration = 0;

        function checkIteration() {
            if (currentIteration >= maxIterations) {
                clearInterval(intervalId); // Arrêter l'insertion périodique
            }
            currentIteration++;
        }

        // Vérifier l'itération après chaque insertion
        imageContainer.addEventListener('DOMNodeInserted', checkIteration);
    });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var slider = @json($slider); // Convertir les données PHP en objet JavaScript
        var imageContainer = document.getElementById('imageContainer');
        var currentIndex = 0;

        function insertNextImage() {
            var imageUrl = slider[currentIndex % slider.length];

            var img = document.createElement('img');
            img.src = '{{ asset('assets/images/sliders/main/4.jpg') }}';
            img.alt = 'showroom africa';
            imageContainer.appendChild(img);

            currentIndex++;
        }

        // Insérer une nouvelle image alternativement
        insertNextImage();
        insertNextImage(); // Insérer la première image

        // Répéter l'insertion alternée toutes les 2 secondes
        var intervalId = setInterval(insertNextImage, 2000);
    });
</script>

@include('frontend.sn.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/devis-modal.js') }}"></script>
@include('frontend.sn.footer.footer1')
@include('frontend.sn.footer.footer2')

<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>
<script src="{{ asset('assets/js/autocompletion.js') }}"></script>


<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
{{-- <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script> --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('assets/js/home.js') }}"></script>

@include('frontend.sn.footer.footer3')
