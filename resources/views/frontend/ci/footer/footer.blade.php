
    <footer class="footer">
        <div class="footer-container">
            <div class="row">
                @foreach ($parametres as $parametre)
                    <div class="footer-col">
                        <h4>Showroom</h4>
                        <img height="40" src="{{ asset('assets/images') }}/{{ $parametre->logo_footer }}" alt="Logo">
                    </div>
                    <div class="footer-col">
                        <div class="pays_flag">
                            <h4 class="title">Sélectionnez votre pays</h4>
                            {{-- <a href="{{ route('home') }}" class="country_flag" style="margin-top: 50%;"><img src="{{ asset('assets/afrik.png') }}" alt="afrique"></a> --}}
                            <a href="{{ route('home.bj',['pays_id'=>1]) }}" class="country_flag"><span class="flag fi fi-bj"></span> </a>
                            <a href="{{ route('home.bf',['pays_id'=>2]) }}" class="country_flag"><span class="flag fi fi-bf"></span> </a>
                            <a href="{{ route('home.bi',['pays_id'=>21]) }}" class="country_flag"><span class="flag fi fi-bi"></span> </a>
                            <a href="{{ route('home.cm',['pays_id'=>3]) }}" class="country_flag"><span class="flag fi fi-cm"></span> </a>
                            <a href="{{ route('home.cf',['pays_id'=>4]) }}" class="country_flag"><span class="flag fi fi-cf"></span> </a>
                            <a href="{{ route('home.cg',['pays_id'=>5]) }}" class="country_flag"><span class="flag fi fi-cg"></span> </a>
                            <a href="{{ route('home.ci',['pays_id'=>6]) }}" class="country_flag"><span class="flag fi fi-ci"></span> </a>
                            <a href="{{ route('home.dj',['pays_id'=>22]) }}" class="country_flag"><span class="flag fi fi-dj"></span> </a>
                            <a href="{{ route('home.ga',['pays_id'=>7]) }}" class="country_flag"><span class="flag fi fi-ga"></span> </a>
                            <a href="{{ route('home.gn',['pays_id'=>26]) }}" class="country_flag"><span class="flag fi fi-gn"></span> </a>
                            <a href="{{ route('home.mg',['pays_id'=>23]) }}" class="country_flag"><span class="flag fi fi-mg"></span> </a>
                            <a href="{{ route('home.ml',['pays_id'=>10]) }}" class="country_flag"><span class="flag fi fi-ml"></span> </a>
                            <a href="{{ route('home.mr',['pays_id'=>24]) }}" class="country_flag"><span class="flag fi fi-mr"></span> </a>
                            <a href="{{ route('home.ne',['pays_id'=>11]) }}" class="country_flag"><span class="flag fi fi-ne"></span> </a>
                            <a href="{{ route('home.cd',['pays_id'=>15]) }}" class="country_flag"><span class="flag fi fi-cd"></span>  </a>
                            <a href="{{ route('home.rw',['pays_id'=>25]) }}" class="country_flag"><span class="flag fi fi-rw"></span> </a>
                            <a href="{{ route('home.sn',['pays_id'=>12]) }}" class="country_flag"><span class="flag fi fi-sn"></span> </a>
                            <a href="{{ route('home.td',['pays_id'=>13]) }}" class="country_flag"><span class="flag fi fi-td"></span> </a>
                            <a href="{{ route('home.tg',['pays_id'=>14]) }}" class="country_flag"><span class="flag fi fi-tg"></span> </a>
                        </div>     
                    </div>
                    <div class="footer-col">
                        <h4>nos réseaux sociaux</h4>
                        <div class="social-links">
                            <a href="{{ $parametre->lienface }}"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{ $parametre->lientwitter }}"><i class="fa-brands fa-twitter"></i></a>
                            <a href="{{ $parametre->lieninsta }}"><i class="fa-brands fa-instagram"></i></a>
                            {{-- <a href="{{ $parametre->lienyoutube }}"><i class="fa-brands fa-youtube"></i></a> --}}
                            <a href="{{ $parametre->lienyoutube }}"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                        <div class="download-app">
                            <a href="https://play.google.com/store/apps/details?id=com.showroomafrica.annuaire">
                                <img src="{{ asset('assets/images/store/playstore-button.jpg') }}" alt="Playstore">
                            </a>
                            {{-- <a href="#">
                                <img src="{{ asset('assets/images/appstore-button.jpg') }}" alt="Appstore">
                            </a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </footer>

    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

<!-- END FOOTER -->
