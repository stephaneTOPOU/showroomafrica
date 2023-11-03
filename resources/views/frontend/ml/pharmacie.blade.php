@include('frontend.ml.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/ml/pharmacie" />
@include('frontend.ml.header.header1')
@include('frontend.ml.header.header2')
@include('frontend.ml.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />

@include('frontend.ml.header.header4')
@include('frontend.ml.header.header5')
@include('frontend.ml.header.header6')
@include('frontend.ml.header.header7')
@include('frontend.ml.header.header8')
@include('frontend.ml.header.header9')

@include('frontend.ml.navbar')

<div class="container">

    <div class="pro-container">

        <div class="professionals-list">
        <h2>Les pharmacies de gardes</h2>

        <div class="professionals">
            @foreach ($pharmacies as $pharmacie)
                <div class="professional-info">
                    <div class="left">
                        <div class="header">
                            <h3 class="professional-name"><b><a href="{{ route('entreprise.pays.profil',['slug_pays'=>$pharmacie->slug_pays,'slug_categorie'=>$pharmacie->slug_categorie,'slug_souscategorie'=>$pharmacie->slug_souscategorie,'slug_entreprise'=>$pharmacie->slug_entreprise]) }}">{{ $pharmacie->nom }}</a></b></h3>
                            <ul>
                                @if ($pharmacie->adresse) <li><i class="fa-light fa-location-dot"></i> {{ $pharmacie->adresse }}</li> @endif
                                @if ($pharmacie->telephone1) <li><i class="fa-light fa-phone"></i>(+223) <b> {{ $pharmacie->telephone1 }} </b> @if ($pharmacie->telephone2)<b> • {{ $pharmacie->telephone2 }} </b> @endif </li>  @endif
                                {{-- <li><i class="fa-light fa-briefcase"></i> <b>Directeur commercial</b></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>

</div>
@include('frontend.ml.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.ml.footer.footer1')
@include('frontend.ml.footer.footer2')
@include('frontend.ml.footer.footer3')