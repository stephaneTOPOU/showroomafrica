@include('frontend.bj.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/bj/pharmacie" />
<link rel="canonicail" href="https://www.showroomafrica.com/bj/pharmacie">
@include('frontend.bj.header.header1')
@include('frontend.bj.header.header2')
@include('frontend.bj.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />

@include('frontend.bj.header.header4')
@include('frontend.bj.header.header5')
@include('frontend.bj.header.header6')
@include('frontend.bj.header.header7')
@include('frontend.bj.header.header8')
@include('frontend.bj.header.header9')

@include('frontend.bj.navbar')

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
                                <li><i class="fa-light fa-location-dot"></i> {{ $pharmacie->adresse }}</li>
                                <li><i class="fa-light fa-phone"></i> {{ $pharmacie->telephone1 }}</li>
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
@include('frontend.bj.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.bj.footer.footer1')
@include('frontend.bj.footer.footer2')
@include('frontend.bj.footer.footer3')