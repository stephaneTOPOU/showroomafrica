@include('frontend.bj.header.header')
@include('frontend.bj.header.header1')
@include('frontend.bj.header.header2')
@include('frontend.bj.header.header3')

    <link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/side-slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/carousel.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/video-player.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/autocompletion.css') }}" />

@include('frontend.bj.header.header4')
@include('frontend.bj.header.header5')
@include('frontend.bj.header.header6')
@include('frontend.bj.header.header7')
@include('frontend.bj.header.header8')
@include('frontend.bj.header.header9')
@include('frontend.bj.navbar')

<div class="container">
    <img src="{{ asset('assets/images/Annuaire.showroom.africa.png') }}" alt="">
</div>

@include('frontend.bj.footer.footer')
<script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.bj.footer.footer1')
<script src="{{ asset('assets/js/video-modal.js') }}"></script>
@include('frontend.bj.footer.footer2')
<script src="{{ asset('assets/js/slider.js') }}"></script>
<script src="{{ asset('assets/js/autocompletion.js') }}"></script>

<script type="text/javascript">
    var counter = 1;
    var count = 1;
    const sliderInterval = setInterval(sliderTimer, 10000);

    function sliderTimer() {
        var radio = document.getElementById('rdo' + count);
        radio.checked = true;
        count++;
        if (count > 2) {
            count = 1;
        }
    }

    setInterval(function () {
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if (counter > 2) {
            counter = 1;
        }
    }, 12000);

</script>

<script type="text/javascript">

    var text = document.getElementById("searchfield");
    var icon = document.getElementById("searchicon");
    var ai = document.getElementById("annuaire_i");
    var a = document.getElementById("annuaire");

    function changeText() {
        text.placeholder = "Rechercher avec un numéro de téléphone";
        ai.classList.add("btn-active");
        a.classList.remove("btn-active");
        icon.classList.remove("fa-buildings");
        icon.classList.add("fa-phone");
    }
    function resetText() {
        text.placeholder = "Rechercher une entreprise ou un professionnel";
        a.classList.add("btn-active");
        ai.classList.remove("btn-active");
        icon.classList.remove("fa-phone");
        icon.classList.add("fa-buildings");
    }

    /* Popup */
    var pop = document.getElementById("popup");
    var cp = document.getElementById("closepop");

    function loadPopup() {
        pop.style.display = "block";
    }

    cp.onclick = function () {
        pop.style.display = "none";
    }
       /* End Popup */

</script>
@include('frontend.bj.footer.footer3')