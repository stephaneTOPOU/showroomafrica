@include('frontend.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/cookie" />
@include('frontend.header.header1')
@include('frontend.header.header2')
@include('frontend.header.header3')
<link rel="stylesheet" href="{{ asset('assets/css/privacy.css') }}" />
@include('frontend.header.header4')
@include('frontend.header.header5')
@include('frontend.header.header6')
@include('frontend.header.header7')
@include('frontend.header.header8')
@include('frontend.header.header9')

@if (Auth::check())
    <nav>

        <a href="{{ route('home') }}" class="nav-icon" aria-label="visit homepage" aria-current="page">
            <img src="{{ asset('assets/images') }}/{{ $parametres->logo_header }}" alt="logo">
        </a>

        <div class="main-navlinks">
            <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="navlinks-container">
                <ul>
                </ul>

                <div class="nav-authentication" id="">
                    <div class="account dropdown">
                        <a href="#" class="initials"><i class="fa-solid fa-circle-user"></i>{{ Str::limit(Auth::user()->name, 2) }}</a>
                        <div class="dropdown-content">
                            <span class="name"><b>{{ Auth::user()->name }}</b> {{ Auth::user()->prenoms }}</span><br>
                            <a href="#"><i class="fa-solid fa-address-card"></i> Mon profil</a><br>
                            <form method="Get" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" type="submit"><i class="fa-regular fa-arrow-right-from-bracket"></i> Déconnexion</a><br>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="nav-authentication" id="">
                <div class="sign-user">
                <a href="#" class="initials"><i class="fa-solid fa-circle-user"></i></a>
                </div>
            </div>
    </nav>
@else
    <nav>

        <a href="{{ route('home') }}" class="nav-icon" aria-label="visit homepage" aria-current="page">
            <img src="{{ asset('assets/images/showroom/logo.png') }}" alt="logo">
        </a>

        <div class="main-navlinks">
            <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="navlinks-container">
                <ul>
                
                </ul>               
            </div>
            </div>

            <div class="nav-authentication" id="accountBtn">
                <a href="#" class="sign-user" aria-label="account">
                    <i class="fa-light fa-circle-user"></i>
                </a>
                <div class="account" id="accountBtn">
                    <i class="fa-light fa-circle-user"></i>
                </div>
            </div>

            
    </nav>
@endif

<!-- MODAL -->
<div id="modalForm" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close"><i class="fa-regular fa-xmark"></i></span>

        <div class="form-container overflow">
            <div class="forms">
                <div class="form login">
                    <span class="title">Connexion</span>
                    @if(Session::has('connexion'))
                        <div class="alert alert-success" role="alert">{{Session::get('connexion') }}</div>
                    @endif
                    <form action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        <div class="input-field">
                            <input type="email" placeholder="Votre email ici" required name="email">
                            <i class="fa-light fa-envelope"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="password" placeholder="Votre mot de passe ici" required name="password">
                            <i class="fa-light fa-lock-keyhole"></i>
                            <i class="fa-light fa-eye-slash showHidePw"></i>
                        </div>

                        <div class="input-field button">
                            <input type="submit" value="Se connecter">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Vous n'êtes pas inscrit ?
                            <b><a href="#" class="text signup-link">Inscrivez-vous</a></b>
                        </span>
                        <span class="text">ou
                            <b><a href="{{ route('entreprise.register') }}" class="text signup-link">Enregistrez votre entreprise</a></b>
                        </span>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="form signup">
                    <span class="title">Inscription</span>
                    @if(Session::has('user'))
                        <div class="alert alert-success" role="alert">{{Session::get('user') }}</div>
                    @endif
                    <form action="{{ route('user.add') }}" method="POST">
                        @csrf
                        <div class="fields">
                            <div class="input-field field">
                                <input type="text" placeholder="Votre nom ici" required name="name">
                                <i class="fa-light fa-user"></i>
                            </div>
                            <div class="input-field field">
                                <input type="text" placeholder="Votre prénom ici" required name="prenoms">
                                <i class="fa-light fa-user"></i>
                            </div>
                        </div>

                        <div class="input-field">
                            <input type="email" placeholder="Votre email ici" required name="email">
                            <i class="fa-light fa-envelope"></i>
                        </div>

                        <div class="input-field">
                            <input type="text" placeholder="Votre adresse ici" required name="adresse">
                            <i class="fa-light fa-map-location-dot"></i>
                        </div>

                        <div class="fields">
                            <div class="input-field field">
                                <input type="text" placeholder="Votre numéro de téléphone" required name="telephone1">
                                <i class="fa-light fa-phone"></i>
                            </div>
                            <div class="input-field field">
                                <input type="text" placeholder="Votre profession ici" required name="fonction">
                                <i class="fa-light fa-briefcase"></i>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="input-field field">
                                <input type="password" class="password" placeholder="Créer votre mot de passe" required name="password">
                                <i class="fa-light fa-lock-keyhole"></i>
                            </div>
                            <div class="input-field field">
                                <input type="password" class="password" placeholder="Confirmer le mot de passe"
                                    required name="password2">
                                <i class="fa-light fa-lock-keyhole"></i>
                                <i class="fa-light fa-eye-slash showHidePw"></i>
                            </div>
                        </div>
                        <div class="input-field button">
                            <input type="submit" value="S'inscrire">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Déjà inscrit ?
                            <b><a href="#" class="text login-link">Connectez-vous maintenant</a></b>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- END MODAL -->


<div class="container">

    <!-- ADVERTORIAL -->
    <div class="privacy-one white-bkg" id="privacy">
        <h1>Cookies</h1>
        <div class="privacy-details">
            <div class="privacy-text">
                <h3>Objet du Cookies</h3>
                <ol>
                    <li>
                        <p>
                            Les cookies sont des fichiers contenant une petite quantité de données qui sont couramment utilisés comme identifiants uniques anonymes. Ceux-ci sont envoyés à votre navigateur depuis les sites Internet que vous visitez et sont stockés dans la mémoire interne de votre appareil.
                        </p>
                    </li>
                    <li>
                        <p>
                            Ce Service n'utilise pas explicitement ces « cookies ». Cependant, l'application peut utiliser du code et des bibliothèques tiers qui utilisent des « cookies » pour collecter des informations et améliorer leurs services. Vous avez la possibilité d'accepter ou de refuser ces cookies et de savoir quand un cookie est envoyé sur votre appareil. Si vous choisissez de refuser nos cookies, vous ne pourrez peut-être pas utiliser certaines parties de ce Service.
                        </p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END ADVERTORIAL -->

</div>


<footer class="footer">
    <div class="footer-container">
        <div class="row">
            <div class="footer-col">
                <h4>Showroom</h4>
                <img height="40" src="{{ asset('assets/images/showroom/logo-white.png') }}" alt="Logo">
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
                    <a target="_blank" href="https://www.facebook.com/profile.php?id=100088884413727&mibextid=ZbWKwL"><i class="fa-brands fa-facebook-f"></i></a>
                    <a target="_blank" href="https://twitter.com/showroomafrica?t=hZRidxlOlhKhoqxnmW2WiQ&s=09"><i class="fa-brands fa-twitter"></i></a>
                    <a target="_blank" href="https://instagram.com/show.roomafrica?igshid=ZDdkNTZiNTM="><i class="fa-brands fa-instagram"></i></a>
                    <a target="_blank" href="https://www.linkedin.com/company/99857808/admin/feed/posts/?feedType=following"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a target="_blank" href="#"><i class="fa-brands fa-youtube"></i></a>
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
        </div>
        <div class="row">
            <style>
                
            </style>
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

  <script src="{{ asset('assets/js/script.js') }}"></script>
  @include('frontend.footer.footer1')
  @include('frontend.footer.footer2')
  @include('frontend.footer.footer3')