@include('frontend.bj.header.header')
@include('frontend.bj.header.header1')
@include('frontend.bj.header.header2')
<link rel="stylesheet" href="{{ asset('assets/css/devis-modal.css') }}" />
@include('frontend.bj.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/companies.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/autocompletion.css') }}" />

@include('frontend.bj.header.header4')
@include('frontend.bj.header.header5')
@include('frontend.bj.header.header6')
@include('frontend.bj.header.header7')
@include('frontend.bj.header.header8')
@include('frontend.bj.header.header9')
@include('frontend.bj.navbar')

<div class="container">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- ADS BIG SLIDER -->
    <div class="img-slider first-slider">
        <div class="slide active">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider as $sliders)
            <div class="slide">
                <img src="{{ asset('assets/images/sliders/search') }}/{{ $sliders->image }}" alt="">
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER -->

    <!-- ADS BIG SLIDER 2 -->
    <div class="img-slider" hidden>
        <div class="slide-two active-two">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider as $slider2)
            <div class="slide-two">
                <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider2->image }}" alt="">
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 2 -->

    <!-- ADS BIG SLIDER 3 -->
    <div class="img-slider" hidden>
        <div class="slide-three active-three">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider as $slider3)
        <div class="slide-three">
            <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider3->image }}" alt="">
        </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 3 -->

    <div class="companies-container">

        <div class="search-bar" style="margin-bottom:2em;">
            <form action="{{ route('recherche.bj',['pays_id'=>1]) }}" autocomplete="off" class="search-form" method="GET">
                <div class="search-field autocomplete">
                    <input id="searchfield" type="text" placeholder="Rechercher une entreprise ou un professionnel" required="" name="nom">
                    <i id="searchicon" class="fa-light fa-buildings"></i>
                </div>

                <script type="text/javascript">
                    var path = "{{ route('autocomplete.bj',['pays_id'=>1]) }}";
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
        @foreach ($sousCategories as $sousCategorie)
            <div id="devismodal" class="devis-modal">
                <!-- Modal content -->
                <div class="contact devis-modal-content">
                    <span class="close" id="closedevis"><i class="fa-regular fa-xmark"></i></span>
                    <span class="titre">Demande de devis</span>
                    <div><h4>Demande de devis sans engagement de votre part</h4></div>
                    @if(Session::has('succes'))
                        <div class="alert alert-success" role="alert">{{Session::get('succes') }}</div>
                    @endif
                    <form action="{{ route('devis.bj.entreprise',['pays_id'=>6,'souscategorie_id'=>$sousCategorie->identifiant]) }}" method="POST">
                        @csrf
                        <div class="select-box">
                            <select name="souscategorie_id" id="souscategorie_id">
                                <option class="placeholder" value="" disabled selected>Secteur d'activité</option>
                                @foreach ($sousCategories as $souscategorie)
                                    <option value="{{ $souscategorie->identifiant }}">{{ $souscategorie->libelle }}</option>
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
        @endforeach
        <!-- END MODAL -->


        <div class="companies-list">
          @foreach ($sousCategories as $sousCategorie)
            <h2>{{ $sousCategorie->libelle }}</h2>
          @endforeach
            <div class="companies">

                @foreach ($entreprises as $entreprise)
                    <div class="company-info">
                        <div class="left">
                            <div class="header">
                                <h3 class="company-name"><a href="{{ route('entreprise.bj.profil',['pays_id'=>$entreprise->pays_id,'entreprise_id'=>$entreprise->id]) }}">{{$entreprise->nom}}</a></h3>
                                <span class="company-category">{{ $entreprise->libelle }}</span>
                                @if ($entreprise->premium == 1)
                                    <div class="premium">
                                        <span><i class="fa-regular fa-gem"></i> PREMIUM</span>
                                    </div>
                                @endif
                            </div>
                            <div class="contacts">
                                <ul>
                                    @if ($entreprise->adresse)
                                        <li>
                                            <i class="fa-light fa-location-dot"></i>
                                            {{ $entreprise->adresse }}
                                        </li>
                                    @endif
                                    
                                    @if ($entreprise->telephone1)
                                        <li><i class="fa-light fa-phone"></i> (+229) <b>{{ $entreprise->telephone1 }} </b>
                                            @if ($entreprise->telephone2)
                                                <b>
                                                    • {{ $entreprise->telephone2 }}
                                                </b> 
                                        @endif </li>
                                    @endif

                                    @if ($entreprise->siteweb)
                                        <li>
                                            <i class="fa-light fa-globe"></i>
                                            <a href="{{ $entreprise->siteweb }}" class="website-link">{{ $entreprise->siteweb }}</a>
                                        </li>
                                    @endif
                                    
                                    @if ($entreprise->itineraire)
                                        <li><i class="fa-light fa-map-location-dot"></i><a href="{{ $entreprise->itineraire }}" class="website-link">Itineraire</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="right">
                            @if ($entreprise->logo)
                                <img src="{{ asset('assets/images/companies/logos') }}/{{ $entreprise->logo }}" alt="{{$entreprise->nom}}">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="top-research">
            <h3>Sociétés les plus recherchées</h3>
            <div class="top-companies">
              @foreach ($entreprisePopulaire as $entreprisePopulair)
                    <div class="top-company-info">
                        <h4><a href="{{ route('entreprise.bj.profil',['pays_id'=>$entreprisePopulair->pays_id,'entreprise_id'=>$entreprisePopulair->id]) }}">{{ $entreprisePopulair->nom }}</a></h4>
                        <ul>
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $entreprisePopulair->adresse }}
                            </li>
                            <li><i class="fa-solid fa-phone"></i> (+229) <b>{{ $entreprisePopulair->telephone1 }}</b></li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
@include('frontend.bj.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/devis-modal.js') }}"></script>
@include('frontend.bj.footer.footer1')
@include('frontend.bj.footer.footer2')

<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>
<script src="{{ asset('assets/js/autocompletion.js') }}"></script>

@include('frontend.bj.footer.footer3')

