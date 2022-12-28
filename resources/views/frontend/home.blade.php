@include('frontend.header')
@include('frontend.navbar')

<!-- CONTAINER-->
<div class="container">

    <!-- BANNER -->
    <div class="sb-container">
        <div class="search-text">
            <h1>Trouvez les meilleurs services & produits aux meilleurs prix en contactant directement les entreprises!
            </h1>
        </div>

        <div class="search-dualbutton">
            <button class="btn btn-active" id="annuaire" onclick="resetText()">Annuaire</button>
            <button class="btn" id="annuaire_i" onclick="changeText()">Annuaire inversé</button>
        </div>

        <div class="search-bar">
            <form action="#" class="search-form">
                <div class="search-field">
                    <input id="searchfield" type="text" placeholder="Rechercher une entreprise ou un professionnel"
                        required="">
                    <i id="searchicon" class="fa-light fa-buildings"></i>
                </div>
                <div class="search-field">
                    <select>
                        <option class="placeholder" value="" disabled selected>Pays</option>
                        <option value="TG">Togo</option>
                        <option value="BN">Bénin</option>
                        <option value="CIV">Côte d'Ivoire</option>
                        <option value="BF">Burkina Faso</option>
                    </select>
                    <i class="fa-light fa-flag"></i>
                </div>

                <div class="search-field">
                    <select>
                        <option class="placeholder" value="" disabled selected>Ville</option>
                        <option>Lomé</option>
                        <option>Kara</option>
                        <option>Atakpamé</option>
                        <option>Sokodé</option>
                        <option>Abidjan</option>
                        <option>Cotonou</option>
                    </select>
                    <i class="fa-light fa-city"></i>
                </div>

                <div class="search-field">
                    <select class="form-select">
                        <option class="placeholder" value="" disabled selected>Secteur d'activités</option>
                        <option>Communication, publicité</option>
                        <option>Bâtiment et construction</option>
                        <option>Administrations</option>
                        <option>Automobile / Moto</option>
                        <option>Télécom. Téléphonie</option>
                        <option>Comptabilité, juridique & conseil</option>
                        <option>Immobilier</option>
                        <option>Tourisme et loisirs</option>
                        <option>Commerces</option>
                        <option>Informatique, internet</option>
                        <option>Santé</option>
                        <option>Finances</option>
                        <option>Associations professionnelles</option>
                        <option>Autres</option>
                        <option>Bien être</option>
                        <option>Emploi</option>
                        <option>Energie</option>
                        <option>Formations, éducation</option>
                        <option>Hygiène</option>
                        <option>Import et export</option>
                        <option>Industries</option>
                        <option>Sécurité</option>
                        <option>Services</option>
                        <option>Sport</option>
                        <option>Transports</option>
                        <option>Urgence</option>
                        <option>Agroalimentaire</option>
                    </select>
                    <i class="fa-light fa-briefcase"></i>
                </div>

                <button type="submit" class="search-button">
                    <i class="fa-solid fa-search"></i>
                    Trouver
                </button>
            </form>
        </div>
    </div>
    <!-- END BANNER -->

    <!-- ADS BIG SLIDER -->
    <div class="img-slider">
        <div class="slide active">
            <img src="{{ asset('assets/images/sliders/main/1.jpg') }}" alt="">
        </div>
        <div class="slide">
            <img src="{{ asset('assets/images/sliders/main/2.jpg') }}" alt="">
        </div>
    </div>
    <!-- END ADS BIG SLIDER -->

    <div class="section-one">
        <div class="categories">
            <h2 class="section-title">Secteurs d'activité</h2>

            <div class="categories-block">
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-bullhorn"></i>
                        <p>Communication & Publicité</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-person-digging"></i>
                        <p>Bâtiments & Constructions</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-user-tie"></i>
                        <p>Administrations</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-car"></i>
                        <p>Automobiles</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-tower-broadcast"></i>
                        <p>Télécoms & Téléphonie</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-scale-balanced"></i>
                        <p>Comptabilité & Conseils juridiques</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-buildings"></i>
                        <p>Immobilier</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-island-tropical"></i>
                        <p>Tourisme & Loisirs</p>
                    </a>
                </div>
                <div class="category">
                    <a href="#">
                        <i class="fa-duotone fa-shop"></i>
                        <p>Commerce</p>
                    </a>
                </div>
            </div>

            <div class="category-link">
                <a href="categories.html">
                    <i class="fa-regular fa-plus"></i>
                    Voir tous les secteurs d'activité
                </a>
            </div>

        </div>

        <div class="advertising">
            <!-- SLIDER 1-->
            <div class="slider">
                <div class="slides">

                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">

                    <div class="slider-slide first">
                        <img src="{{ asset('assets/images/sliders/side/1.jpg') }}">
                    </div>
                    <div class="slider-slide">
                        <img src="{{ asset('assets/images/sliders/side/2.jpg') }}">
                    </div>

                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                    </div>

                </div>
            </div>

            <!-- SLIDER 2-->
            <div class="slider">
                <div class="slides">

                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <div class="slider-slide first">
                        <img src="{{ asset('assets/images/sliders/side/3.jpg') }}">
                    </div>
                    <div class="slider-slide">
                        <img src="{{ asset('assets/images/sliders/side/2.jpg') }}">
                    </div>

                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <!-- NEWCOMERS -->
    <div class="section-one white-bkg">
        <h1>Ils nous ont rejoint</h1>
        <div class="carousel-container">
            <div class="carousel">
                <img src="{{ asset('assets/images/carousel/dodo_style.png') }}" alt="DODO Style" />
                <img src="{{ asset('assets/images/carousel/krystal_optique.png') }}" alt="Krystal Optique" />
                <img src="{{ asset('assets/images/carousel/boad.png') }}" alt="BOAD" />
                <img src="{{ asset('assets/images/carousel/sanlam.png') }}" alt="SANLAM Insurance" />
                <img src="{{ asset('assets/images/carousel/sunu.png') }}" alt="SUNU Assurance" />
                <img src="{{ asset('assets/images/carousel/dodo_plast.png') }}" alt="DODO PLAST" />
            </div>

            <div class="carousel">
                <img src="{{ asset('assets/images/carousel/dodo_style.png') }}" alt="DODO Style" />
                <img src="{{ asset('assets/images/carousel/krystal_optique.png') }}" alt="Krystal Optique" />
                <img src="{{ asset('assets/images/carousel/boad.png') }}" alt="BOAD" />
                <img src="{{ asset('assets/images/carousel/sanlam.png') }}" alt="SANLAM Insurance" />
                <img src="{{ asset('assets/images/carousel/sunu.png') }}" alt="SUNU Assurance" />
                <img src="{{ asset('assets/images/carousel/dodo_plast.png') }}" alt="DODO PLAST" />
            </div>
        </div>
    </div>
    <!-- END NEWCOMERS -->

    <!-- SPOTS -->
    <div class="section-one">
        <h1>Mini-Spots</h1>
        <div class="row">
            <div class="video-list">
                <div class="video-list-inner video">
                    <img class="play" src="{{ asset('assets/videos/posters/moov.png') }}">
                    <div class="play">
                        <i class="fa-regular fa-circle-play"></i>
                    </div>
                    <video class="hide" muted src="{{ asset('assets/videos/moov.mp4') }}" controls
                        poster="{{ asset('assets/videos/posters/moov.png') }}">
                </div>
            </div>

            <div class="video-list">
                <div class="video-list-inner video">
                    <img class="play" src="{{ asset('assets/videos/posters/dp.png') }}">
                    <div class="play">
                        <i class="fa-regular fa-circle-play"></i>
                    </div>
                    <video class="hide" muted src="{{ asset('assets/videos/dma.mp4') }}" controls
                        poster="{{ asset('assets/videos/posters/dp.png') }}">
                </div>
            </div>
        </div>

        <div class="video-container">
            <i class="fa-solid fa-circle-xmark close"></i>
            <video src="" autoplay controls poster=""></video>
        </div>

    </div>
    <!-- END SPOTS -->

    <!-- REPORTAGE -->
    <div class="section-one blue-bkg">
        <h1>Reportage</h1>
        <iframe class="youtube-video" src="https://www.youtube.com/embed/zsT1EX0towk"
            title="Découvrons l'Afriklub Karting!!" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>

    </div>
    <!-- END REPORTAGE -->

    <!-- MAGAZINES -->
    <div class="section-one white-bkg">
        <h1>Magazines</h1>
        <div class="magazines">
            <div class="magazine">
                <div class="magazine-details">
                    <img class="magazine-img" src="{{ asset('assets/images/magazines/togo_couleurs.jpg') }}">
                    <button type="button" class="discover-btn">
                        <a href=""><i class="fa-light fa-plus"></i> Découvrir</a>
                    </button>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="magazine">
                <div class="magazine-details">
                    <img class="magazine-img" src="{{ asset('assets/images/magazines/dagan.png') }}">
                    <button type="button" class="discover-btn">
                        <a href=""><i class="fa-light fa-plus"></i> Découvrir</a>
                    </button>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="magazine">
                <div class="magazine-details">
                    <img class="magazine-img" src="{{ asset('assets/images/magazines/gnadoe.jpg') }}">
                    <button type="button" class="discover-btn">
                        <a href=""><i class="fa-light fa-plus"></i> Découvrir</a>
                    </button>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- END MAGAZINES -->
</div>
<!-- END CONTAINER-->

@include('frontend.footer')