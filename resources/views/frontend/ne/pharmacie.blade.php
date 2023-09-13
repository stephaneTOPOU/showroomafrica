@include('frontend.ne.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/ne/pharmacie/11" />
<link rel="canonicail" href="https://www.showroomafrica.com/ne/pharmacie/11">
@include('frontend.ne.header.header1')
@include('frontend.ne.header.header2')
@include('frontend.ne.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />

@include('frontend.ne.header.header4')
@include('frontend.ne.header.header5')
@include('frontend.ne.header.header6')
@include('frontend.ne.header.header7')
@include('frontend.ne.header.header8')
@include('frontend.ne.header.header9')

@include('frontend.ne.navbar')

<div class="container">

    <div class="pro-container">

        <div class="professionals-list">
        <h2>Les pharmacies de gardes</h2>

        <div class="professionals">
            @foreach ($pharmacies as $pharmacie)
                <div class="professional-info">
                    <div class="left">
                        <div class="header">
                            <h3 class="professional-name"><b><a href="{{ route('entreprise.ne.profil',['pays_id'=>$pharmacie->pays_id,'entreprise_id'=>$pharmacie->id]) }}">{{ $pharmacie->nom }}</a></b></h3>
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
@include('frontend.ne.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.ne.footer.footer1')
@include('frontend.ne.footer.footer2')
@include('frontend.ne.footer.footer3')