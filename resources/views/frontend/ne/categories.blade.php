@include('frontend.ne.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/ne/categorie" />
<link rel="canonicail" href="https://www.showroomafrica.com/ne/categorie">
@include('frontend.ne.header.header1')
@include('frontend.ne.header.header2')
@include('frontend.ne.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />

@include('frontend.ne.header.header4')
@include('frontend.ne.header.header5')
@include('frontend.ne.header.header6')
@include('frontend.ne.header.header7')
@include('frontend.ne.header.header8')
@include('frontend.ne.header.header9')
@include('frontend.ne.navbar')

<div class="container">

    <!-- ADS BIG SLIDER -->
    <div class="img-slider first-slider">
        <div class="slide active" data-bs-interval="1">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="showroom africa">
        </div>
        @foreach ($slider as $sliders)
            <div class="slide" data-bs-interval="1">
                <img src="{{ asset('assets/images/sliders/search') }}/{{ $sliders->image }}" alt="{{ $sliders->image }}">
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
                <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider2->image }}" alt="{{ $slider2->image }}">
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
            <img src="{{ asset('assets/images/sliders/main') }}/{{ $slider3->image }}" alt="{{ $slider3->image }}">
        </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER 3 -->

    <div class="categories-container">
        <h1>Toutes les catégories</h1>
        <div class="categories-list">
            @foreach ($categories as $categorie)
                <div class="accordion-item">
                    <header class="accordion-header">
                        <i class='fa-regular fa-plus accordion-icon'></i>
                        <h3 class="accordion-title">{{ $categorie->cat }}</h3>
                    </header>

                    <div class="accordion-content">
                        <ul class="accordion-description">
                            @foreach ($souscategories as $souscategorie)
                                @if ($categorie->idCat == $souscategorie->id1)
                                    <li><a href="{{ route('entreprise.pays',['slug_pays'=>$categorie->slug_pays,'slug_categorie'=>$categorie->slug_categorie,'slug_souscategorie'=>$souscategorie->slug_souscategorie])}}">{{ $souscategorie->subcat }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@include('frontend.ne.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.ne.footer.footer1')
@include('frontend.ne.footer.footer2')

<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>

@include('frontend.ne.footer.footer3')
