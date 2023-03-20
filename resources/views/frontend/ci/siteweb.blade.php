@include('frontend.ci.header.header')
@include('frontend.ci.header.header1')
@include('frontend.ci.header.header2')
@include('frontend.ci.header.header3')
<link rel="stylesheet" href="{{ asset('assets/css/services.css') }}" />
@include('frontend.ci.header.header4')
@include('frontend.ci.header.header5')
@include('frontend.ci.header.header6')
@include('frontend.ci.header.header7')
@include('frontend.ci.header.header8')
@include('frontend.ci.header.header9')

@include('frontend.ci.navbar')

<div class="container">

    <!-- ADVERTORIAL -->
    <div class="section-one white-bkg" id="website">
        <h1>Sites web</h1>
        <div class="service-details">
            <img src="{{ asset('assets/images/services/website.png') }}" alt="website">
            <div class="section-text">
            <h3>Création de site web</h3>
            <p>
                Notre agence web se spécialise dans la conception et le développement de sites Web adaptatifs sur mesure grâce à son riche savoir-faire et son équipe expérimentée.
                Notre entreprise s’assure de maintenir les plus hauts standards de qualité lors du développement de sites Internet que ce soit pour une création totale ou une refonte.
                Du design à la programmation, nous saurons cerner vos besoins pour vous offrir un site Web qui répondra à vos besoins et à vos attentes.
                Nos experts sauront mettre en place un plan stratégique pour répondre à vos objectifs et garantir votre satisfaction.
            </p>

            <h3>Refonte de site web</h3>
            <p>
                Les webmasters de l’entreprise SHOWROOM AFRICA emploient leur savoir-faire et leur vigilance afin d’être à la hauteur de la clientèle et
                délivrer des solutions qui combinent l’originalité, la profitabilité et l’efficience. Pour les plateformes web rencontrant des problèmes
                et nécessitant des solutions efficaces, nous nous tenons à votre disposition afin de remédier ses défaillances ainsi que ses faiblesses et
                assurer la refonte de votre site internet sur mesure.
            </p>
            </div>
        </div>
    </div>
    <!-- END ADVERTORIAL -->

</div>

@include('frontend.ci.footer.footer')
  <script src="{{ asset('assets/js/script.js') }}"></script>
  @include('frontend.ci.footer.footer1')
  @include('frontend.ci.footer.footer2')
  @include('frontend.ci.footer.footer3')