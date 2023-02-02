@include('frontend.header')
<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/companies.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/autocompletion.css') }}" />
@include('frontend.navbar')
<div class="container">

    <!-- ADS BIG SLIDER -->
    <div class="img-slider first-slider">
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

    <div class="companies-container">

        <div class="search-bar" style="margin-bottom:2em;">
            <form action="#" autocomplete="off" class="search-form">
                <div class="search-field autocomplete">
                    <input id="searchfield" type="text" placeholder="Rechercher une entreprise ou un professionnel" required="">
                    <i id="searchicon" class="fa-light fa-buildings"></i>
                </div>

                <button type="submit" class="search-button">
                    <i class="fa-solid fa-search"></i>
                    Trouver
                </button>
            </form>
        </div>

        <div class="companies-list">
            <div class="companies">

                @foreach ($recherches as $recherche)
                    <div class="company-info">
                        <div class="left">
                            <div class="header">
                                <h3 class="company-name"><a href="{{ route('entreprise.profil',['entreprise_id'=>$recherche->id]) }}">{{$recherche->nom}}</a></h3>
                                <span class="company-category">{{ $recherche->sousCategorie }}</span>
                                @if ($recherche->premium == 1)
                                    <div class="premium">
                                        <span><i class="fa-regular fa-gem"></i> PREMIUM</span>
                                    </div>
                                @endif
                            </div>
                            <div class="contacts">
                                <ul>
                                    @if ($recherche->adresse)
                                        <li>
                                            <i class="fa-light fa-location-dot"></i>
                                            {{ $recherche->adresse }}
                                        </li>
                                    @endif
                                    
                                    @if ($recherche->telephone1)
                                        <li><i class="fa-light fa-phone"></i> (+228) <b>{{ $recherche->telephone1 }}@if ($recherche->telephone2)
                                            • {{ $recherche->telephone2 }}</b>
                                        @endif </li>
                                    @endif
                                    
                                    @if ($recherche->siteweb)
                                        <li>
                                            <i class="fa-light fa-globe"></i>
                                            <a href="{{ $recherche->siteweb }}" class="website-link">{{ $recherche->siteweb }}</a>
                                        </li>
                                    @endif
                                    
                                    @if ($recherche->itineraire)
                                    <li><i class="fa-light fa-map-location-dot"></i><a href="{{ $recherche->itineraire }}" class="website-link">Itineraire</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="right">
                            @if ($recherche->logo)
                                <img src="{{ asset('assets/images/companies')}}/{{ $recherche->logo }}" alt="{{$recherche->nom}}">
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

        <div class="top-research">
            <h3>Sociétés les plus recherchées</h3>
            <div class="top-companies">
                @foreach ($entreprisePopulaire as $entreprisePopulair)
                    <div class="top-company-info">
                        <h4><a href="#">{{ $entreprisePopulair->nom }}</a></h4>
                        <ul>
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $entreprisePopulair->adresse }}
                            </li>
                            <li><i class="fa-solid fa-phone"></i> (+228) <b>{{ $entreprisePopulair->telephone1 }}</b></li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>
<script src="{{ asset('assets/js/autocompletion.js') }}"></script>

    <script type="text/javascript">
    /*An array containing all the country names in the world:*/
     var companies = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

     /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
     autocomplete(document.getElementById("searchfield"), companies);
    </script>

    <!-- END SCRIPTS -->
@include('frontend.footer')