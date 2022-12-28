<footer class="footer">
    <div class="footer-container">
        <div class="row">
            <div class="footer-col">
                <h4>Showroom</h4>
                <img height="40" src="{{ asset('assets/images/logo-white.png') }}" alt="Logo">
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
                        Avédji, Lomé-Togo
                    </div>
                    <div class="info-detail">
                        <i class="fa-light fa-phone"></i>
                        (+228) 99 41 64 21
                    </div>
                    <div class="info-detail">
                        <i class="fa-light fa-envelope"></i>
                        contact@showroomafrica.com
                    </div>
                </div>
            </div>
            <div class="footer-col">
            <h4>nos réseaux sociaux</h4>
            <div class="social-links">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->


<!-- SCRIPTS -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/modal.js') }}"></script>
<script src="{{ asset('assets/js/forms.js') }}"></script>
<script src="{{ asset('assets/js/slider.js') }}"></script>

<script type="text/javascript">
    var counter = 1;
    setInterval(function () {
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if (counter > 2) {
        counter = 1;
        }
    }, 12000);
</script>

<script type="text/javascript">

    var text = document.getElementById("searchfield");
    var icon = document.getElementById("searchicon");
    var ai = document.getElementById("annuaire_i");
    var a = document.getElementById("annuaire");

    function changeText() {
        text.placeholder = "Rechercher avec un numéro de téléphone";
        ai.classList.add("btn-active");
        a.classList.remove("btn-active");
        icon.classList.remove("fa-buildings");
        icon.classList.add("fa-phone");
    }
    function resetText() {
        text.placeholder = "Rechercher une entreprise ou un professionnel";
        a.classList.add("btn-active");
        ai.classList.remove("btn-active");
        icon.classList.remove("fa-phone");
        icon.classList.add("fa-buildings");
    }

</script>
<!-- END SCRIPTS -->
@yield('javascripts')

</body>

</html>