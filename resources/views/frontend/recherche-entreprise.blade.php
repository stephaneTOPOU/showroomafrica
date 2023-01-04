@include('frontend.header')
    <link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/companies.css') }}" />
@include('frontend.navbar')
<div class="container">

    <!-- ADS BIG SLIDER -->
    <div class="img-slider">
        <div class="slide active">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider as $sliders)
            <div class="slide">
                <img src="{{ asset('assets/images/sliders') }}/{{ $sliders->image }}" alt="">
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER -->

    <div class="companies-container">

        <div class="companies-list">
            <div class="companies">

                <div class="company-info">
                    <div class="left">
                        <div class="header">
                            <h3 class="company-name"><a href="#">Showroom Africa</a></h3>
                            <span class="company-category">Annuaire en ligne</span>
                        </div>
                        <div class="contacts">
                            <ul>
                                <li>
                                    <i class="fa-light fa-location-dot"></i>
                                    Derrière la pharmacie Laus Deo, Avédji, Lomé-TOGO
                                </li>
                                <li><i class="fa-light fa-phone"></i> (+228) <b>92 22 94 33 • 99 41 64 21</b></li>
                                <li><i class="fa-light fa-map-location-dot"></i> Itinéraire</li>
                            </ul>
                        </div>
                    </div>

                    <div class="right">
                        <img src="{{ asset('assets/images/companies/logos/showroomafrica.png') }}" alt="Showroom Africa">
                    </div>

                </div>
                @foreach ($recherches as $recherche)
                    <div class="company-info">
                        <div class="left">
                            <div class="header">
                                <h3 class="company-name"><a href="{{ route('entreprise.profil',['entreprise_id'=>$recherche->id]) }}">{{$recherche->nom}}</a></h3>
                                <span class="company-category">{{ $recherche->sousCategorie }}</span>
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
                                        <li><i class="fa-light fa-phone"></i> (+228) <b>{{ $recherche->telephone1 }}@if ($recherche->telephone2)
                                            • {{ $recherche->telephone2 }}</b>
                                        @endif </li>
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
                                <img src="{{ asset('assets/images/companies')}}/{{ $recherche->logo }}" alt="{{$recherche->nom}}">
                            @else
                                <div class="carousel-text"> <b>{{ $recherche->nom }}</b></div>
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
<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>
@include('frontend.footer')