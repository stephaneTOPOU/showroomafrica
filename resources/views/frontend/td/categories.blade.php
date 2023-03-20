@include('frontend.td.header.header')
@include('frontend.td.header.header1')
@include('frontend.td.header.header2')
@include('frontend.td.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />

@include('frontend.td.header.header4')
@include('frontend.td.header.header5')
@include('frontend.td.header.header6')
@include('frontend.td.header.header7')
@include('frontend.td.header.header8')
@include('frontend.td.header.header9')
@include('frontend.td.navbar')

<div class="container">

    <!-- ADS BIG SLIDER -->
    <div class="img-slider first-slider">
        <div class="slide active">
            <img src="{{ asset('assets/images/sliders/main/4.jpg') }}" alt="">
        </div>
        @foreach ($slider as $sliders)
            <div class="slide">
                <img src="{{ asset('assets/images/sliders/main') }}/{{ $sliders->image }}" alt="">
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
@include('frontend.td.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.td.footer.footer1')
@include('frontend.td.footer.footer2')

<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>

@include('frontend.td.footer.footer3')
