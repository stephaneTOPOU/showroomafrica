@include('frontend.tg.header.header')
@include('frontend.tg.header.header1')
@include('frontend.tg.header.header2')
@include('frontend.tg.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/companies.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/autocompletion.css') }}" />

@include('frontend.tg.header.header4')
@include('frontend.tg.header.header5')
@include('frontend.tg.header.header6')
@include('frontend.tg.header.header7')
@include('frontend.tg.header.header8')
@include('frontend.tg.header.header9')

@include('frontend.tg.navbar')

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
                <img src="{{ asset('assets/images/sliders/main') }}/{{ $sliders->image }}" alt="">
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER -->

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

        <div class="companies-list">
          @foreach ($sousCategories as $sousCategorie)
            <h2>{{ $sousCategorie->libelle }}</h2>
          @endforeach
            <div class="companies">

                @foreach ($entreprises as $entreprise)
                    <div class="company-info">
                        <div class="left">
                            <div class="header">
                                <h3 class="company-name"><a href="{{ route('entreprise.profil',['entreprise_id'=>$entreprise->id]) }}">{{$entreprise->nom}}</a></h3>
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
                                        <li><i class="fa-light fa-phone"></i> (+228) <b>{{ $entreprise->telephone1 }} </b>
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
                        <h4><a href="#">{{ $entreprisePopulair->nom }}</a></h4>
                        <ul>
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $entreprisePopulair->adresse }}
                            </li>
                            <li><i class="fa-solid fa-phone"></i> (+228) <b>{{ $entreprisePopulair->telephone1 }}</b></li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
@include('frontend.tg.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.tg.footer.footer1')
@include('frontend.tg.footer.footer2')

<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>
<script src="{{ asset('assets/js/autocompletion.js') }}"></script>

@include('frontend.tg.footer.footer3')

