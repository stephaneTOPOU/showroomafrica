@include('frontend.header')
<link rel="stylesheet" href="{{ asset('assets/css/categories.css') }}" />
@include('frontend.navbar')

<div class="container">

    <!-- ADS BIG SLIDER -->
    <div class="img-slider">
        <div class="slide active">
            <img src="{{ asset('assets/images/sliders/main/1.jpg') }}" alt="">
        </div>
        <div class="slide">
            <img src="{{ asset('assets/images/sliders/main/3.jpg') }}" alt="">
        </div>
    </div>
    <!-- END ADS BIG SLIDER -->

    <div class="categories-container">
        <h1>Toutes les catégories</h1>
        <div class="categories-list">
            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Administrations</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Administrations</a></li>
                        <li><a href="#">Fondations</a></li>
                        <li><a href="#">Ministères</a></li>
                        <li><a href="#">Offices nationaux</a></li>
                        <li><a href="#">ONG</a></li>
                        <li><a href="#">Organismes internationaux</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Agro-industrie</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Agriculture</a></li>
                        <li><a href="#">Agro-alimentaire</a></li>
                        <li><a href="#">Agrochimie & Agronomie</a></li>
                        <li><a href="#">Production agricole biologique</a></li>
                        <li><a href="#">Produits agricoles</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Automobile & Moto</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Véhicules industriels</a></li>
                        <li><a href="#">Vente de camions</a></li>
                        <li><a href="#">Vente de motos</a></li>
                        <li><a href="#">Vente de voitures</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Bâtiment & Construction</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Adduction d'eau & Forage</a></li>
                        <li><a href="#">Aménagement foncier</a></li>
                        <li><a href="#">Architectes</a></li>
                        <li><a href="#">Ascenseurs</li>
                        <li><a href="#">Assainissement & Canalisations</a></li>
                        <li><a href="#">Bâtiment & Travaux publics</a></li>
                        <li><a href="#">Carrelage</a></li>
                        <li><a href="#">Carrière & Concassage</a></li>
                        <li><a href="#">Constructions métalliques</a></li>
                        <li><a href="#">Carrière & Concassage</a></li>
                        <li><a href="#">Chaudronnerie</a></li>
                        <li><a href="#">Décoration d'intérieur</a></li>
                        <li><a href="#">Froid & Climatisation</a></li>
                        <li><a href="#">Matériaux de construction</li>
                        <li><a href="#">Menuiserie bois & Ebénisterie</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Bien-être</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Centres d'amincissement</a></li>
                        <li><a href="#">Salon de beauté et d'esthétique</a></li>
                        <li><a href="#">Salons de coiffure</a></li>
                        <li><a href="#">SPA / Saunas</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Communication & publicité</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Art Graphique</a></li>
                        <li><a href="#">Audiovisuel</a></li>
                        <li><a href="#">Centres d'appels</a></li>
                        <li><a href="#">Editeurs</a></li>
                        <li><a href="#">Enseignes & Gravures</a></li>
                        <li><a href="#">Enseignes lumineuses</a></li>
                        <li><a href="#">Evénementiel</a></li>
                        <li><a href="#">Impression numérique</a></li>
                        <li><a href="#">Imprimeries</a></li>
                        <li><a href="#">Journaux, Presse & Magazine</a></li>
                        <li><a href="#">Magazines</a></li>
                        <li><a href="#">Médias, Radios & TV</a></li>
                        <li><a href="#">Multimédias</a></li>
                        <li><a href="#">Régie publicitaire</a></li>
                        <li><a href="#">Salons d'expositions & Foires</a></li>
                        <li><a href="#">Sérigraphie</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Comptabilité, juridique & conseil</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Audit & Conseil</a></li>
                        <li><a href="#">Bureaux d'études</a></li>
                        <li><a href="#">Cabinets d'avocats</a></li>
                        <li><a href="#">Commissaires aux comptes</a></li>
                        <li><a href="#">Commissaires-priseurs</a></li>
                        <li><a href="#">Commissionnaires en douane</a></li>
                        <li><a href="#">Conseil juridique & Conseil fiscal</a></li>
                        <li><a href="#">Expertise comptable</a></li>
                        <li><a href="#">Gestion des ressources humaines</a></li>
                        <li><a href="#">Huissiers de justice</a></li>
                        <li><a href="#">Notaires</a></li>
                        <li><a href="#">Propriété intellectuelle</a></li>
                        <li><a href="#">Sociétés de recouvrement</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Elevage & Pêche</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Fermes avicoles</a></li>
                        <li><a href="#">Produits d’élevage</a></li>
                        <li><a href="#">Produits laitiers</a></li>
                        <li><a href="#">Pêche (commercialisation, exportation)</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Commerces</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Accessoires de mode</a></li>
                        <li><a href="#">Alimentation générale</a></li>
                        <li><a href="#">Centres commerciaux</a></li>
                        <li><a href="#">Commerce général</a></li>
                        <li><a href="#">Epicerie</a></li>
                        <li><a href="#">Grossistes en alimentation</a></li>
                        <li><a href="#">Produits Congelés / Surgelés</a></li>
                        <li><a href="#">Prêt à porter</a></li>
                        <li><a href="#">Produits cosmétiques</a></li>
                        <li><a href="#">Quincaillerie</a></li>
                        <li><a href="#">Représentation commerciale</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Emploi</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Agences de recrutement</a></li>
                        <li><a href="#">Travail temporaire & Intérim</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Energies</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Batteries et piles</a></li>
                        <li><a href="#">Electricité (production, distribution)</a></li>
                        <li><a href="#">Electromécanique & Electrotechnique</a></li>
                        <li><a href="#">Energie solaire / renouvelable</a></li>
                        <li><a href="#">Equipements pétroliers</a></li>
                        <li><a href="#">Gaz</a></li>
                        <li><a href="#">Génie Électrique / Électriciens</a></li>
                        <li><a href="#">Groupe électrogène</a></li>
                        <li><a href="#">Hydrocarbures</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Finances</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Assurances</a></li>
                        <li><a href="#">Assurances - Courtiers</a></li>
                        <li><a href="#">Banques</a></li>
                        <li><a href="#">Bureaux d'appui financier</a></li>
                        <li><a href="#">Bureaux de change</a></li>
                        <li><a href="#">Epargne</a></li>
                        <li><a href="#">Equipement bancaire</a></li>
                        <li><a href="#">Expertise financière</a></li>
                        <li><a href="#">Microfinances</a></li>
                        <li><a href="#">Organismes de crédit</a></li>
                        <li><a href="#">Sociétés de bourse</a></li>
                        <li><a href="#">Sociétés de financement</a></li>
                        <li><a href="#">Transferts de fonds</a></li>
                        <li><a href="#">Transport de fonds</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Formations & éducation</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Bibliothèque / Médiathèque</a></li>
                        <li><a href="#">Centres de formation</a></li>
                        <li><a href="#">Centres de recherche</a></li>
                        <li><a href="#">Crèche, jardin d'enfants</a></li>
                        <li><a href="#">Ecole de langue</a></li>
                        <li><a href="#">Ecole de mode</a></li>
                        <li><a href="#">Ecole maternelle</a></li>
                        <li><a href="#">Ecoles primaires</a></li>
                        <li><a href="#">Ecoles secondaires</a></li>
                        <li><a href="#">Ecoles secondaires techniques</a></li>
                        <li><a href="#">Enseignement supérieur - Université</a></li>
                        <li><a href="#">Formation professionnelle</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Hygiène</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Hygiène corporelle</a></li>
                        <li><a href="#">Hygiène et entretien</a></li>
                        <li><a href="#">Ménage à domicile</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <header class="accordion-header">
                    <i class='fa-regular fa-plus accordion-icon'></i>
                    <h3 class="accordion-title">Immobilier</h3>
                </header>

                <div class="accordion-content">
                    <ul class="accordion-description">
                        <li><a href="#">Agences immobilières</a></li>
                        <li><a href="#">Expertise immobilière</a></li>
                        <li><a href="#">Gestion immobilière</a></li>
                        <li><a href="#">Promoteurs immobiliers</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</div>
<script src="{{ asset('assets/js/accordion.js') }}"></script>
@include('frontend.footer')