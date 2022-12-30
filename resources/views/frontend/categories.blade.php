@include('frontend.header')
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />
@include('frontend.navbar')

<div class="container">

    <!-- ADS BIG SLIDER -->
    <div class="img-slider">
        <div class="slide active">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider as $sliders)
            <div class="slide">
                <img src="{{ asset('assets/images/sliders') }}/{{ $sliders->image }}" alt="">
            </div>
        @endforeach
    </div>
    <!-- END ADS BIG SLIDER -->

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
                                <li><a href="{{ route('entreprise',['souscategorie_id'=>$souscategorie->id])}}">{{ $souscategorie->subcat }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
<script src="{{ asset('assets/js/accordion.js') }}"></script>
@include('frontend.footer')