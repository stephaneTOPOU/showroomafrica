
    <footer class="footer">
        <div class="footer-container">
            <div class="row">
                <div class="footer-col">
                    <h4>Showroom</h4>
                    <img height="40" src="{{ asset('assets/images') }}/{{ $parametres->logo_footer }}" alt="Logo">
                </div>
                <div class="footer-col">
                    <h4>liens rapides</h4>
                    <ul>
                        <li><a href="/">accueil</a></li>
                        <li><a href="{{ route('categorie') }}">catégories</a></li>
                        <li><a href="{{ route('professionnel') }}">professionnels</a></li>
                        <li><a href="#">offres d'emploi</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>contact</h4>
                    <div class="infos">
                        <div class="info-detail">
                            <i class="fa-light fa-location-dot"></i>
                            {{ $parametres->adresse }}
                        </div>
                        <div class="info-detail">
                            <i class="fa-light fa-phone"></i>
                            (+228) {{ $parametres->telephone1 }}
                        </div>
                        <div class="info-detail">
                            <i class="fa-light fa-envelope"></i>
                            {{ $parametres->email }}
                        </div>
                    </div>
                </div>
                <div class="footer-col">
                <h4>nos réseaux sociaux</h4>
                <div class="social-links">
                    <a href="{{ $parametres->lienface }}"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{ $parametres->lientwitter }}"><i class="fa-brands fa-twitter"></i></a>
                    <a href="{{ $parametres->lieninsta }}"><i class="fa-brands fa-instagram"></i></a>
                    <a href="{{ $parametres->lienyoutube }}"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
            </div>
        </div>
    </footer>


<!-- END FOOTER -->
