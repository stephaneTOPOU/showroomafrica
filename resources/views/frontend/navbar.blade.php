<nav>

    <a href="/" class="nav-icon" aria-label="visit homepage" aria-current="page">
        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
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
                <a href="/" aria-current="page" class="current"><span class="flag fi fi-tg"></span> Togo</a>
            </li>
            <li class="dropdown">
                <a href="#">Entreprise<i class="fa-regular fa-chevron-down"></i></a>
                <div class="dropdown-content">
                <a href="{{ route('entreprise') }}">Agences de communication</a><br>
                <a href="{{ route('entreprise') }}">Arts graphiques</a><br>
                <a href="{{ route('entreprise') }}">Audiovisuel</a><br>
                <a href="{{ route('entreprise') }}">Centres d'appel</a><br>
                <a href="{{ route('entreprise') }}">Toutes les catégories</a>
                </div>
            </li>
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
                <a href="#">Sites web</a><br>
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

<!-- MODAL -->
<div id="modalForm" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close"><i class="fa-regular fa-xmark"></i></span>

        <div class="form-container overflow">
            <div class="forms">
                <div class="form login">
                    <span class="title">Connexion</span>

                    <form action="#">
                        <div class="input-field">
                            <input type="email" placeholder="Votre email ici" required>
                            <i class="fa-light fa-envelope"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="password" placeholder="Votre mot de passe ici" required>
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

                    <form action="#">
                        <div class="fields">
                            <div class="input-field field">
                                <input type="text" placeholder="Votre nom ici" required>
                                <i class="fa-light fa-user"></i>
                            </div>
                            <div class="input-field field">
                                <input type="text" placeholder="Votre prénom ici" required>
                                <i class="fa-light fa-user"></i>
                            </div>
                        </div>

                        <div class="input-field">
                            <input type="email" placeholder="Votre email ici" required>
                            <i class="fa-light fa-envelope"></i>
                        </div>

                        <div class="input-field">
                            <input type="text" placeholder="Votre adresse ici" required>
                            <i class="fa-light fa-map-location-dot"></i>
                        </div>

                        <div class="fields">
                            <div class="input-field field">
                                <input type="text" placeholder="Votre numéro de téléphone" required>
                                <i class="fa-light fa-phone"></i>
                            </div>
                            <div class="input-field field">
                                <input type="text" placeholder="Votre profession ici" required>
                                <i class="fa-light fa-briefcase"></i>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="input-field field">
                                <input type="password" class="password" placeholder="Créer votre mot de passe" required>
                                <i class="fa-light fa-lock-keyhole"></i>
                            </div>
                            <div class="input-field field">
                                <input type="password" class="password" placeholder="Confirmer le mot de passe"
                                    required>
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

<!-- END HEADER -->