@include('frontend.bf.header.header')
@foreach ($souscategories as $souscategorie)
    <meta property="og:url" content="https://www.showroomafrica.com/bf/sous-categories/2/{{ $souscategorie->identifiant }}" />
    <link rel="canonicail" href="https://www.showroomafrica.com/bf/sous-categories/2/{{ $souscategorie->identifiant }}">
@endforeach
@include('frontend.bf.header.header1')
@include('frontend.bf.header.header2')
@include('frontend.bf.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />

@include('frontend.bf.header.header4')
@include('frontend.bf.header.header5')
@include('frontend.bf.header.header6')
@include('frontend.bf.header.header7')
@include('frontend.bf.header.header8')
@include('frontend.bf.header.header9')
@include('frontend.bf.navbar')

<div class="container">

    <!-- ADS BIG SLIDER -->
    <div class="img-slider first-slider">
        <div class="slide active">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider as $sliders)
            <div class="slide">
                <img src="{{ asset('assets/images/sliders/search') }}/{{ $sliders->image }}" alt="">
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER -->
    <!-- ADS BIG SLIDER 2 -->
    <div class="img-slider" hidden>
        <div class="slide-two active-two">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider as $slider2)
            <div class="slide-two">
                <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider2->image }}" alt="">
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 2 -->

    <!-- ADS BIG SLIDER 3 -->
    <div class="img-slider" hidden>
        <div class="slide-three active-three">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider as $slider3)
        <div class="slide-three">
            <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider3->image }}" alt="">
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
                    <a href="{{ route('entreprise.bf',['pays_id'=>2,'souscategorie_id'=>$souscategorie->identifiant])}}" style="text-decoration: none">
                        <header class="accordion-header">
                            <h3 class="accordion-title">{{ $souscategorie->nom }}</h3>
                        </header>
                    </a>
                    
                </div>
            @endforeach
        </div>
    </div>

</div>
@include('frontend.bf.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.bf.footer.footer1')
@include('frontend.bf.footer.footer2')

<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>

@include('frontend.bf.footer.footer3')