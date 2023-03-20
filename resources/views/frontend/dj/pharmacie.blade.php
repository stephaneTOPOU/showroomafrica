@include('frontend.dj.header.header')
@include('frontend.dj.header.header1')
@include('frontend.dj.header.header2')
@include('frontend.dj.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />

@include('frontend.dj.header.header4')
@include('frontend.dj.header.header5')
@include('frontend.dj.header.header6')
@include('frontend.dj.header.header7')
@include('frontend.dj.header.header8')
@include('frontend.dj.header.header9')

@include('frontend.dj.navbar')

<div class="container">

    <div class="pro-container">

        <div class="professionals-list">
        <h2>Les pharmacies de gardes</h2>

        <div class="professionals">
            @foreach ($pharmacies as $pharmacie)
                <div class="professional-info">
                    <div class="left">
                        <div class="header">
                            <h3 class="professional-name"><b><a href="{{ route('entreprise.profil',['entreprise_id'=>$pharmacie->id]) }}">{{ $pharmacie->nom }}</a></b></h3>
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
@include('frontend.dj.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.dj.footer.footer1')
@include('frontend.dj.footer.footer2')
@include('frontend.dj.footer.footer3')