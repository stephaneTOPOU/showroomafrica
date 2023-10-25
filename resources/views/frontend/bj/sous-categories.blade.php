@include('frontend.bj.header.header')
@foreach ($souscategories as $souscategorie)
<meta property="og:url" content="https://www.showroomafrica.com/bj/{{ $souscategorie->slug_categorie }}" />
<link rel="canonicail" href="https://www.showroomafrica.com/bj/{{ $souscategorie->slug_categorie }}">
@endforeach
@include('frontend.bj.header.header1')
@include('frontend.bj.header.header2')
@include('frontend.bj.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />

@include('frontend.bj.header.header4')
@include('frontend.bj.header.header5')
@include('frontend.bj.header.header6')
@include('frontend.bj.header.header7')
@include('frontend.bj.header.header8')
@include('frontend.bj.header.header9')
@include('frontend.bj.navbar')

<div class="container">

    <!-- ADS BIG SLIDER -->
    <div class="img-slider first-slider">
        <div class="slide active">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="showroom africa">
        </div>
        @foreach ($slider as $sliders)
            <div class="slide">
                <img src="{{ asset('assets/images/sliders/search') }}/{{ $sliders->image }}" alt="{{ $sliders->image }}">
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER -->
    <!-- ADS BIG SLIDER 2 -->
    <div class="img-slider" hidden>
        <div class="slide-two active-two">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="showroom africa">
        </div>
        @foreach ($slider as $slider2)
            <div class="slide-two">
                <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider2->image }}" alt="{{ $slider2->image }}">
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 2 -->

    <!-- ADS BIG SLIDER 3 -->
    <div class="img-slider" hidden>
        <div class="slide-three active-three">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="showroom africa">
        </div>
        @foreach ($slider as $slider3)
        <div class="slide-three">
            <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider3->image }}" alt="{{ $slider3->image }}">
        </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 3 -->

    <div class="categories-container">
        @foreach ($categories as $categorie)
            <h1>{{ $categorie->nom }}</h1>
        @endforeach
        
        <div class="categories-list">
            @foreach ($souscategories as $souscategorie)
                <div class="accordion-item">
                    <a href="{{ route('entreprise.pays',['slug_pays'=>$souscategorie->slug_pays,'slug_categorie'=>$souscategorie->slug_categorie,'slug_souscategorie'=>$souscategorie->slug_souscategorie])}}" style="text-decoration: none">
                        <header class="accordion-header">
                            <h3 class="accordion-title">{{ $souscategorie->nom }}</h3>
                        </header>
                    </a>
                    
                </div>
            @endforeach
        </div>
    </div>

</div>
@include('frontend.bj.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.bj.footer.footer1')
@include('frontend.bj.footer.footer2')

<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>

@include('frontend.bj.footer.footer3')
