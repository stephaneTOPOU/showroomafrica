@include('frontend.sn.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/sn/liste-pharmacie-de-garde" />
<link rel="canonical" href="https://www.showroomafrica.com/sn/liste-pharmacie-de-garde" />
@include('frontend.sn.header.header1')
@include('frontend.sn.header.header2')
@include('frontend.sn.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />

@include('frontend.sn.header.header4')
@include('frontend.sn.header.header5')
@include('frontend.sn.header.header6')
@include('frontend.sn.header.header7')
@include('frontend.sn.header.header8')
@include('frontend.sn.header.header9')

@include('frontend.sn.navbar')

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
                                @if ($pharmacie->telephone1) <li><i class="fa-light fa-phone"></i>(+221) <b> {{ $pharmacie->telephone1 }} </b> @if ($pharmacie->telephone2)<b> • {{ $pharmacie->telephone2 }} </b> @endif </li>  @endif
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
@include('frontend.sn.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.sn.footer.footer1')
@include('frontend.sn.footer.footer2')
@include('frontend.sn.footer.footer3')