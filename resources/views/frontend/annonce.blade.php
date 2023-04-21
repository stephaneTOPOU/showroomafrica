@include('frontend.header.header')
@include('frontend.header.header1')
@include('frontend.header.header2')
@include('frontend.header.header3')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<link rel="stylesheet" href="{{ asset('assets/css/annonce.css') }}" />
@include('frontend.header.header4')
@include('frontend.header.header5')
@include('frontend.header.header6')
@include('frontend.header.header7')
@include('frontend.header.header8')
@include('frontend.header.header9')

@include('frontend.navbar')

<div class="container">

    <!-- ADVERTORIAL -->
    <div class="section-one white-bkg" id="annonce">
        <h1>Titre</h1>
        <div class="service-details">
            
            <div class="section-text">
            {{-- <h3>Création de site web</h3> --}}
            <p>
                Notre agence web se spécialise dans la conception et le développement de sites Web adaptatifs sur mesure grâce à son riche savoir-faire et son équipe expérimentée.
                Notre entreprise s’assure de maintenir les plus hauts standards de qualité lors du développement de sites Internet que ce soit pour une création totale ou une refonte.
                Du design à la programmation, nous saurons cerner vos besoins pour vous offrir un site Web qui répondra à vos besoins et à vos attentes.
                Nos experts sauront mettre en place un plan stratégique pour répondre à vos objectifs et garantir votre satisfaction.
            </p>
            <br />

            {{-- <h3>Refonte de site web</h3> --}}
            <img src="{{ asset('assets/images/advertorial/telephonie.jpg') }}" width="100%">
            <br />
            <br />
            <p>
                Les webmasters de l’entreprise SHOWROOM AFRICA emploient leur savoir-faire et leur vigilance afin d’être à la hauteur de la clientèle et
                délivrer des solutions qui combinent l’originalité, la profitabilité et l’efficience. Pour les plateformes web rencontrant des problèmes
                et nécessitant des solutions efficaces, nous nous tenons à votre disposition afin de remédier ses défaillances ainsi que ses faiblesses et
                assurer la refonte de votre site internet sur mesure.
            </p>
            <br />
            <img src="{{ asset('assets/images/advertorial/alimentation.jpg') }}" width="100%">
            <br/>
            <br/>
            <p>
                Les webmasters de l’entreprise SHOWROOM AFRICA emploient leur savoir-faire et leur vigilance afin d’être à la hauteur de la clientèle et
                délivrer des solutions qui combinent l’originalité, la profitabilité et l’efficience. Pour les plateformes web rencontrant des problèmes
                et nécessitant des solutions efficaces, nous nous tenons à votre disposition afin de remédier ses défaillances ainsi que ses faiblesses et
                assurer la refonte de votre site internet sur mesure.
            </p>
            </div>
            
            <div class="section-annonce">
                <video src="{{ asset('assets/videos/dma.mp4') }}" autoplay muted controls></video>

                <br />
                <br />
                <h3>Actualités récentes</h3>
                <div class="slider">
                    <div class="img-div"><img src="{{ asset('assets/images/advertorial/divers.jpg') }}"></div>
                    <div class="img-div"><img src="{{ asset('assets/images/advertorial/commerce.jpg') }}"  ></div>
                    <div class="img-div"><img src="{{ asset('assets/images/advertorial/telephonie.jpg') }}" ></div>
                    <div class="img-div"><img src="{{ asset('assets/images/advertorial/alimentation.jpg') }}"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ADVERTORIAL -->

</div>

@include('frontend.footer.footer')
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('assets/js/annonce.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>
  @include('frontend.footer.footer1')
  @include('frontend.footer.footer2')
  @include('frontend.footer.footer3')