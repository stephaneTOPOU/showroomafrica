@include('frontend.cd.header.header')
@include('frontend.cd.header.header1')
@include('frontend.cd.header.header2')
@include('frontend.cd.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />

@include('frontend.cd.header.header4')
@include('frontend.cd.header.header5')
@include('frontend.cd.header.header6')
@include('frontend.cd.header.header7')
@include('frontend.cd.header.header8')
@include('frontend.cd.header.header9')

@include('frontend.cd.navbar')

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
@include('frontend.cd.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.cd.footer.footer1')
@include('frontend.cd.footer.footer2')
@include('frontend.cd.footer.footer3')