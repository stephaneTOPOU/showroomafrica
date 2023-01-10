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
          @foreach ($sousCategories as $sousCategorie)
            <h2>{{ $sousCategorie->libelle }}</h2>
          @endforeach
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

                @foreach ($entreprises as $entreprise)
                    <div class="company-info">
                        <div class="left">
                            <div class="header">
                                <h3 class="company-name"><a href="{{ route('entreprise.profil',['entreprise_id'=>$entreprise->id]) }}">{{$entreprise->nom}}</a></h3>
                                <span class="company-category">{{ $entreprise->libelle }}</span>
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
                                        <li><i class="fa-light fa-phone"></i> (+228) <b>{{ $entreprise->telephone1 }}@if ($entreprise->telephone2) • {{ $entreprise->telephone2 }}</b>
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
                            <img src="{{ asset('assets/images/companies') }}/{{ $entreprise->logo }}" alt="{{$entreprise->nom}}">
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