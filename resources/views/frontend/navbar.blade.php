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
                    <li>
                        <a href="#" id="flag" aria-current="page" class="current">Trouver pays</a>
                    </li>
                    <li>
                        <a href="{{ route('categorie') }}">Entreprises</a>
                    </li>
                    {{-- <li class="dropdown">
                <a href="#">Entreprise<i class="fa-regular fa-chevron-down"></i></a>
                <div class="dropdown-content">
                    @foreach ($sousCategorieNavs as $sousCategorieNav)
                        <a href="{{ route('entreprise',['souscategorie_id'=>$sousCategorieNav->id]) }}">{{ $sousCategorieNav->libelle }}</a><br>
                    @endforeach
                </div>
            </li> --}}
                    <li>
                        <a href="{{ route('professionnel') }}">Professionnels</a>
                    </li>
                    <li class="dropdown">
                        <a href="#">Opportunités<i class="fa-regular fa-chevron-down"></i></a>
                        <div class="dropdown-content">
                            <a href="#">Affaires</a><br>
                            <a href="#">Offre d'emplois</a><br>
                        </div>
                    </li><br>
                    <li class="dropdown">
                        <a href="#">Services<i class="fa-regular fa-chevron-down"></i></a>
                        <div class="dropdown-content">
                            <a href="#">Comptabilité</a><br>
                            <a href="#">Audit</a><br>
                            <a href="{{ route('service.siteweb') }}">Sites web</a><br>
                            <a href="#">Centres d'appel</a><br>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

                <div class="nav-authentication" id="">
                    <div class="account dropdown">
                        <a href="#" class="initials"><i
                                class="fa-solid fa-circle-user"></i>{{ Str::limit(Auth::user()->name, 2) }}</a>
                        <div class="dropdown-content">
                            <span class="name"><b>{{ Auth::user()->name }}</b> {{ Auth::user()->prenoms }}</span><br>
                            <a href="#"><i class="fa-solid fa-address-card"></i> Mon profil</a><br>
                            <form method="Get" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" type="submit"><i
                                        class="fa-regular fa-arrow-right-from-bracket"></i> Déconnexion</a><br>
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
                    <li>
                        <a href="#" id="flag" aria-current="page" class="current"> Trouver pays </a>
                    </li>
                    <li>
                        <a href="{{ route('categorie') }}">Entreprises</a>
                    </li>
                    {{-- <li class="dropdown">
                <a href="#">Entreprise<i class="fa-regular fa-chevron-down"></i></a>
                <div class="dropdown-content">
                    @foreach ($sousCategorieNavs as $sousCategorieNav)
                        <a href="{{ route('entreprise',['souscategorie_id'=>$sousCategorieNav->id]) }}">{{ $sousCategorieNav->libelle }}</a><br>
                    @endforeach
                </div>
            </li> --}}
                    <li>
                        <a href="{{ route('professionnel') }}">Professionnels</a>
                    </li>
                    <li class="dropdown">
                        <a href="#">Opportunités<i class="fa-regular fa-chevron-down"></i></a>
                        <div class="dropdown-content">
                            <a href="#">Affaires</a><br>
                            <a href="#">Offre d'emplois</a><br>
                        </div>
                    </li><br>
                    <li class="dropdown">
                        <a href="#">Services<i class="fa-regular fa-chevron-down"></i></a>
                        <div class="dropdown-content">
                            <a href="#">Comptabilité</a><br>
                            <a href="#">Audit</a><br>
                            <a href="{{ route('service.siteweb') }}">Sites web</a><br>
                            <a href="#">Centres d'appel</a><br>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
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
                    @if (Session::has('connexion'))
                        <div class="alert alert-success" role="alert">{{ Session::get('connexion') }}</div>
                    @endif
                    <form action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        <div class="input-field">
                            <input type="email" placeholder="Votre email ici" required name="email">
                            <i class="fa-light fa-envelope"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="password" placeholder="Votre mot de passe ici" required
                                name="password">
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
                            <b><a href="{{ route('entreprise.register') }}" class="text signup-link">Enregistrez
                                    votre entreprise</a></b>
                        </span>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="form signup">
                    <span class="title">Inscription</span>
                    @if (Session::has('user'))
                        <div class="alert alert-success" role="alert">{{ Session::get('user') }}</div>
                    @endif
                    <form action="{{ route('user.add') }}" method="POST" id="RegisterForm">
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
                                <input type="text" placeholder="Votre numéro de téléphone" required
                                    name="telephone1">
                                <i class="fa-light fa-phone"></i>
                            </div>
                            <div class="input-field field">
                                <input type="text" placeholder="Votre profession ici" required name="fonction">
                                <i class="fa-light fa-briefcase"></i>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="input-field field">
                                <input type="password" class="password" placeholder="Créer votre mot de passe"
                                    required name="password" id="password">
                                <i class="fa-light fa-lock-keyhole"></i>
                            </div>
                            <span id="password-error" style="color: red;"></span>
                            <div class="input-field field">
                                <input type="password" class="password" placeholder="Confirmer le mot de passe"
                                    required name="password2" id="password2">
                                <i class="fa-light fa-lock-keyhole"></i>
                                <i class="fa-light fa-eye-slash showHidePw"></i>
                            </div>
                            <span id="confirmPassword-error" style="color: red;"></span>
                        </div>
                        <div class="input-field button">
                            <input type="submit" value="S'inscrire">
                        </div>
                    </form>

                    <script>
                        document.getElementById('RegisterForm').addEventListener('submit', function(event) {
                            var password = document.getElementById('password').value;
                            var confirmPassword = document.getElementById('password2').value;
                            var passwordError = document.getElementById('password-error');
                            var confirmPasswordError = document.getElementById('confirmPassword-error');

                            var isValid = true;

                            // Reset errors
                            passwordError.textContent = '';
                            confirmPasswordError.textContent = '';

                            if (password.length < 8) {
                                event.preventDefault(); // Empêche la soumission du formulaire
                                passwordError.textContent = 'Le mot de passe doit comporter au moins 8 caractères.';
                                isValid = false;
                            }

                            if (password !== confirmPassword) {
                                event.preventDefault(); // Empêche la soumission du formulaire
                                confirmPasswordError.textContent = 'Les mots de passe ne correspondent pas.';
                                isValid = false;
                            }

                            // if (isValid) {
                            //     alert('Mot de passe valide.');
                            //     // Vous pouvez soumettre le formulaire ici si vous le souhaitez
                            //     // this.submit(); // Décommentez cette ligne si vous voulez soumettre le formulaire
                            // }
                        });
                    </script>

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

<!-- END HEADER -->

<div id="countries_popup" class="modal">
    <!-- popup content -->
    <div class="modal-content">
        <span class="close" id="closecp"><i class="fa-regular fa-xmark"></i></span>

        <div class="popup-container">
            <div class="countries">
                <span class="title">Sélectionnez votre pays</span>
                <div class="countries_flag">
                    <a href="{{ route('home') }}" class="country_flag selected"><img
                            src="{{ asset('assets/afrique.jpg') }}" alt="afrique"></a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'bj']) }}" class="country_flag"><span
                            class="flag fi fi-bj"></span> Bénin</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'bf']) }}" class="country_flag"><span
                            class="flag fi fi-bf"></span> Burkina Faso</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'ci']) }}" class="country_flag"><span
                            class="flag fi fi-ci"></span> Côte d'Ivoire</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'ml']) }}" class="country_flag"><span
                            class="flag fi fi-ml"></span> Mali</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'ne']) }}" class="country_flag"><span
                            class="flag fi fi-ne"></span> Niger</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'sn']) }}" class="country_flag"><span
                            class="flag fi fi-sn"></span> Sénégal</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'tg']) }}" class="country_flag"><span
                            class="flag fi fi-tg"></span> Togo</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'cm']) }}" class="country_flag"><span
                            class="flag fi fi-cm"></span> Cameroun</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'cf']) }}" class="country_flag"><span
                            class="flag fi fi-cf"></span> Centrafrique</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'cg']) }}" class="country_flag"><span
                            class="flag fi fi-cg"></span> Congo - Brazzaville</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'dj']) }}" class="country_flag"><span
                            class="flag fi fi-dj"></span> Djibouti</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'ga']) }}" class="country_flag"><span
                            class="flag fi fi-ga"></span> Gabon</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'gn']) }}" class="country_flag"><span
                            class="flag fi fi-gn"></span> Guinée - Conakry</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'mg']) }}" class="country_flag"><span
                            class="flag fi fi-mg"></span> Madagascar</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'mr']) }}" class="country_flag"><span
                            class="flag fi fi-mr"></span> Mauritanie</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'cd']) }}" class="country_flag"><span
                            class="flag fi fi-cd"></span> République Démocratique du Congo</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'rw']) }}" class="country_flag"><span
                            class="flag fi fi-rw"></span> Rwanda</a>
                    <a href="{{ route('home.pays', ['slug_pays' => 'td']) }}" class="country_flag"><span
                            class="flag fi fi-td"></span> Tchad</a>
                </div>
            </div>
        </div>

    </div>

</div>
