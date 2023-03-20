@include('frontend.bf.header.header')
@include('frontend.bf.header.header1')
@include('frontend.bf.header.header2')
@include('frontend.bf.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />

@include('frontend.bf.header.header4')
@include('frontend.bf.header.header5')
@include('frontend.bf.header.header6')
@include('frontend.bf.header.header7')
@include('frontend.bf.header.header8')
@include('frontend.bf.header.header9')

@include('frontend.bf.navbar')

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
@include('frontend.bf.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.bf.footer.footer1')
@include('frontend.bf.footer.footer2')
@include('frontend.bf.footer.footer3')