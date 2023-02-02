@include('frontend.header')
<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />
@include('frontend.navbar')

<div class="container">

    <div class="pro-container">

        <div class="professionals-list">
        <h2>Les pharmacies de gardes</h2>

        <div class="professionals">
            @foreach ($pharmacies as $pharmacie)
                <div class="professional-info">
                    <div class="left">
                    <h3>{{ $pharmacie->nom }}</b></h3>
                    <ul>
                        <li><i class="fa-light fa-location-dot"></i> {{ $pharmacie->adresse }}</li>
                        <li><i class="fa-light fa-phone"></i> {{ $pharmacie->telephone1 }}</li>
                        {{-- <li><i class="fa-light fa-briefcase"></i> <b>Directeur commercial</b></li> --}}
                    </ul>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>

</div>

@include('frontend.footer')