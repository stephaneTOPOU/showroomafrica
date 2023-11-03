
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
                            <a href="{{ route('home.pays',['slug_pays'=>'bj']) }}" class="country_flag"><span class="flag fi fi-bj"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'bf']) }}" class="country_flag"><span class="flag fi fi-bf"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'ci']) }}" class="country_flag"><span class="flag fi fi-ci"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'ne']) }}" class="country_flag"><span class="flag fi fi-ne"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'tg']) }}" class="country_flag"><span class="flag fi fi-tg"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'cm']) }}" class="country_flag"><span class="flag fi fi-cm"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'cf']) }}" class="country_flag"><span class="flag fi fi-cf"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'cg']) }}" class="country_flag"><span class="flag fi fi-cg"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'dj']) }}" class="country_flag"><span class="flag fi fi-dj"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'ga']) }}" class="country_flag"><span class="flag fi fi-ga"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'gn']) }}" class="country_flag"><span class="flag fi fi-gn"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'mg']) }}" class="country_flag"><span class="flag fi fi-mg"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'ml']) }}" class="country_flag"><span class="flag fi fi-ml"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'mr']) }}" class="country_flag"><span class="flag fi fi-mr"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'cd']) }}" class="country_flag"><span class="flag fi fi-cd"></span>  </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'rw']) }}" class="country_flag"><span class="flag fi fi-rw"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'sn']) }}" class="country_flag"><span class="flag fi fi-sn"></span> </a>
                            <a href="{{ route('home.pays',['slug_pays'=>'td']) }}" class="country_flag"><span class="flag fi fi-td"></span> </a>
                        </div>    
                    </div>
                    <div class="footer-col">
                        <h4>nos réseaux sociaux</h4>
                        <div class="social-links">
                            <a target="_blank" href="{{ $parametre->lienface }}"><i class="fa-brands fa-facebook-f"></i></a>
                            <a target="_blank" href="{{ $parametre->lientwitter }}"><i class="fa-brands fa-twitter"></i></a>
                            <a target="_blank" href="{{ $parametre->lieninsta }}"><i class="fa-brands fa-instagram"></i></a>
                            <a target="_blank" href="{{ $parametre->lienyoutube }}"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a target="_blank" href="{{ $parametre->lienlinkedin }}"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                        <div class="download-app">
                            <a href="https://play.google.com/store/apps/details?id=com.showroomafrica.annuaire" target="_blank">
                                <img src="{{ asset('assets/images/store/playstore-button.jpg') }}" alt="Playstore">
                            </a>
                            {{-- <a href="#">
                                <img src="{{ asset('assets/images/appstore-button.jpg') }}" alt="Appstore">
                            </a> --}}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="privacy">
                    <div class="privacy-item">
                        <a class="blog" href="{{ route('blog') }}">Blog</a>
                        <a class="cookie" href="{{ route('cgu') }}">Condition générale d'utilisation</a>
                        <a class="cookie" href="{{ route('cp') }}">Politique de confidentialité</a>
                        <a class="cookie" href="{{ route('cookie') }}">politique de cookie</a>
                    </div>
                </div>
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
