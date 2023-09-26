@include('frontend.header.header')
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
    <div class="blogs-one white-bkg" id="privacy">
        <h1>Blog</h1>
        <div class="privacy-details">
            <div class="privacy-text">
                <div class="blog-one">
                    <div class="blogs">
                        @foreach ($blogs as $blog)
                            <a class="blog" href="{{ route('blog.detail',['blog_id'=>$blog->id]) }}">
                                <img src="{{ asset('assets/images/blog/images') }}/{{ $blog->image1 }}">
                                <div class="description">
                                    <h3>{!! Str::limit( $blog->titre, 20) !!}</h3>
                                    <p>
                                        {!! Str::limit( $blog->description1, 200) !!}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
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
                    {{-- <a href="{{ route('home') }}" class="country_flag" style="margin-top: 50%;"><img src="{{ asset('assets/afrik.png') }}" alt="afrique"></a> --}}
                    <a href="{{ route('home.bj',['pays_id'=>1]) }}" class="country_flag"><span class="flag fi fi-bj"></span> </a>
                    <a href="{{ route('home.bf',['pays_id'=>2]) }}" class="country_flag"><span class="flag fi fi-bf"></span> </a>
                    <a href="{{ route('home.ci',['pays_id'=>6]) }}" class="country_flag"><span class="flag fi fi-ci"></span> </a>
                    <a href="{{ route('home.ne',['pays_id'=>11]) }}" class="country_flag"><span class="flag fi fi-ne"></span> </a>
                    <a href="{{ route('home.tg',['pays_id'=>14]) }}" class="country_flag"><span class="flag fi fi-tg"></span> </a>
                    {{-- <a href="{{ route('home.bi',['pays_id'=>21]) }}" class="country_flag"><span class="flag fi fi-bi"></span> </a> --}}
                    <a href="{{ route('home.cm',['pays_id'=>3]) }}" class="country_flag"><span class="flag fi fi-cm"></span> </a>
                    <a href="{{ route('home.cf',['pays_id'=>4]) }}" class="country_flag"><span class="flag fi fi-cf"></span> </a>
                    <a href="{{ route('home.cg',['pays_id'=>5]) }}" class="country_flag"><span class="flag fi fi-cg"></span> </a>
                    {{-- <a href="{{ route('home.ci',['pays_id'=>6]) }}" class="country_flag"><span class="flag fi fi-ci"></span> </a> --}}
                    <a href="{{ route('home.dj',['pays_id'=>22]) }}" class="country_flag"><span class="flag fi fi-dj"></span> </a>
                    <a href="{{ route('home.ga',['pays_id'=>7]) }}" class="country_flag"><span class="flag fi fi-ga"></span> </a>
                    <a href="{{ route('home.gn',['pays_id'=>26]) }}" class="country_flag"><span class="flag fi fi-gn"></span> </a>
                    <a href="{{ route('home.mg',['pays_id'=>23]) }}" class="country_flag"><span class="flag fi fi-mg"></span> </a>
                    <a href="{{ route('home.ml',['pays_id'=>10]) }}" class="country_flag"><span class="flag fi fi-ml"></span> </a>
                    <a href="{{ route('home.mr',['pays_id'=>24]) }}" class="country_flag"><span class="flag fi fi-mr"></span> </a>
                    {{-- <a href="{{ route('home.ne',['pays_id'=>11]) }}" class="country_flag"><span class="flag fi fi-ne"></span> </a> --}}
                    <a href="{{ route('home.cd',['pays_id'=>15]) }}" class="country_flag"><span class="flag fi fi-cd"></span>  </a>
                    <a href="{{ route('home.rw',['pays_id'=>25]) }}" class="country_flag"><span class="flag fi fi-rw"></span> </a>
                    <a href="{{ route('home.sn',['pays_id'=>12]) }}" class="country_flag"><span class="flag fi fi-sn"></span> </a>
                    <a href="{{ route('home.td',['pays_id'=>13]) }}" class="country_flag"><span class="flag fi fi-td"></span> </a>
                    {{-- <a href="{{ route('home.tg',['pays_id'=>14]) }}" class="country_flag"><span class="flag fi fi-tg"></span> </a> --}}
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
                    <a class="blog" href="#">Blog</a>
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