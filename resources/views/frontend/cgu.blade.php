@include('frontend.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/cgu" />
<link rel="canonical" href="https://www.showroomafrica.com/cgu" />
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
        <h1>Condition générale d'utilisation</h1>
        <div class="privacy-details">
            <div class="privacy-text">
                <h3>OBJET DES CGU</h3>
                <ol>
                    <li>
                        <p>
                            Les CGU fixent les conditions générales d'utilisation par toute Personne du Site Internet et des Services disponibles sur le Sites Internet, et décrivent les droits et obligations de tout Utilisateur du Site Internet et des Services rendus accessibles par l’Editeur, que l'Utilisateur possède ou non un Compte.
                        </p>
                    </li>
                    <li>
                        <p>
                            Toute Personne, tout Utilisateur déclare en accédant au Site Internet et/ou en utilisant les Services payants ou gratuits, avoir pris connaissance des CGU et les accepter expressément sans réserve et/ou modification de quelque nature que ce soit.
                        </p>
                    </li>
                </ol>
                

                <h3>MODALITE D'UTILISATION DU SITE INTERNET</h3>
                <ol>
                    <li>
                        <p>
                            Il appartient à l’Utilisateur de s’équiper de manière appropriée afin de pouvoir se connecter au Site Internet. L’ensemble des frais d’équipements, de connexion et de transmission nécessaires à l’utilisation du Site Internet et des Services payants ou gratuits qui y sont accessibles, est à la charge exclusive de l'Utilisateur. L’Utilisateur est par ailleurs informé que certains numéros de téléphone d’entreprises affichés sur le Site Internet pourront être des "numéros surtaxés" ou générant des frais d'itinérance. L'Utilisateur assume seul le coût des communications téléphoniques lié à ces numéros surtaxés ou générant ces frais d'itinérance.
                        </p>
                    </li>
                    <li>
                        <p>
                            L’accès et l'utilisation du Site Internet par l'Utilisateur est effectuée à ses seuls risques et périls. L'Utilisateur reconnaît avoir été informé que les transmissions de données et des Informations sur le réseau Internet bénéficient d'une fiabilité technique relative, en dépit des protections mis en œuvre, que tout site Internet peut faire l'objet d'intrusions de tiers non autorisés, et que les informations circulant sur le réseau Internet ne sont pas protégées contre des détournements éventuels ou contre des virus éventuels.
                        </p>
                    </li>
                    <li>
                        <p>
                            Il appartient donc à l'Utilisateur de prendre les mesures appropriées afin de protéger ses propres données et/ou logiciels stockés sur ses équipements informatiques contre toute atteinte ayant pour origine un accès au Site Internet ou une utilisation des Services.
                        </p>
                    </li>
                    <li>
                        <p>
                            L’Editeur ne garantit pas que le Site Internet et les Services seront exempts de toute interruption, retard, incident de sécurité ou erreur, que les résultats obtenues grâce aux Services seront précis ou exacts, ou que tout défaut du Service sera corrigé.
                        </p>
                    </li>
                    <li>
                        <p>
                            Ainsi, l’Editeur ne saurait être tenu responsable de tout dommage direct ou indirect, de quelle que nature que ce soit, pouvant survenir à l'occasion de l'utilisation ou de l'impossibilité d'utiliser le Site Internet ou les Services. De même, l’Editeur ne saurait être tenu responsable de désagréments ou d'erreurs causés par une perturbation des réseaux de communication électronique et notamment du réseau Internet, ni des dégâts accidentels ou volontaires subis par l'Utilisateur ou provoqués par lui-même ou par des Personnes tiers.
                        </p>
                    </li>
                </ol>

                <h3>FONCTIONNALITE DU SITE INTERNET</h3>
                <p>
                    <ol>
                        <li><b>La Plateforme de Sourcing : </b>
                            <p>
                                L'Editeur propose à l'Utilisateur d'accéder à une base de données répertoriant environ 200.000 entreprises et permettant la mise en relation des Personnes entre elles, agissant toutes dans un cadre professionnel, communément appelé "B2B" (Business to Business), via le Site Internet. La consultation de la Plateforme de Sourcing par les Utilisateurs est gratuite. Pour être référencé au sein de la Plateforme de Sourcing, l'Utilisateur a la possibilité, après avoir ouvert un Compte, d'accéder à l'Espace Connecté lui permettant : soit de créer pour son entreprise un Profil Entreprise gratuit, soit de créer un Profil Entreprise payant.
                            </p>
                        </li>
                        <li><b>L'Espace Connecté : </b>
                            <p>
                                L'Espace Connecté est un Service du Site Internet permettant à l'Utilisateur titulaire d'un Compte de disposer d'un Profil Entreprise sur la Plateforme de Sourcing lui offrant ainsi la possibilité de présenter ses activités, ses produits et services, d'afficher ses coordonnées et d'intégrer un lien hypertexte vers son propre site internet. L'Editeur mettra à disposition de l'Utilisateur sur le Site Internet un espace de publication du profil d’entreprise de l'Utilisateur qui lui sera réservé et lui communiquera par courrier électronique les Moyens d'Accès qui lui permettront d’ajouter, modifier, supprimer directement tous les éléments du Profil Entreprise (textes, photographies, vidéogrammes...).
                            </p>
                        </li>
                        <li><b>Messagerie : </b>
                            <p>
                                L'Utilisateur, après acceptation des CGU, peut envoyer des demandes de renseignements aux entreprises référencées par la Plateforme de Sourcing du Site Internet à l'aide de la Messagerie ou du formulaire de contact mis à sa disposition. Si l’Utilisateur choisit d’envoyer une demande de renseignements par le biais de la Messagerie ou du formulaire de contact, certaines de ses Informations Personnelles, y compris l'adresse e-mail de l'Utilisateur, pourront être visibles par l’entreprise contactée.
                                L'Utilisateur utilisant la Messagerie ou le formulaire de contact s’engagent à ce que ses messages ne comportent aucun Elément Illicite et à adopter un comportement loyal et de bonne foi à l’égard des interlocuteurs contactés.
                                Les demandes de renseignements faites au travers de la Messagerie ou du formulaire de contact par l'Utilisateur sont disponibles pour être consultée par leurs destinataires et aussi par les collaborateurs du service client de l'Editeur, qui peuvent partager ces demandes de renseignements avec d'autres Utilisateurs ou toute autre Personne, ce que l'Utilisateur reconnait et accepte. L'Editeur peut également utiliser à certaines occasions des serveurs d’e-mail tiers pour envoyer et suivre la réception des messages de demandes de renseignements de l'Utilisateur et analyser le schéma de l’utilisation des demandes de renseignements fourni par ces systèmes de suivi tiers, ce que l'Utilisateur reconnaît et accepte.
                                L'Utilisateur est seul responsable du Contenu de ses messages échangés via la Messagerie.
                                L'Editeur se réserve la faculté de suspendre ou interdire l’accès au Service, notamment à la Messagerie, et au Compte de tout Utilisateur ne respectant les CGU.
                            </p>
                        </li>
                        <li><b>Autres Services</b>
                            <p>
                                L'Editeur peut mettre à la disposition des Utilisateurs des Services non décrits dans les CGU. Même dans ce cas, toutes les dispositions des CGU sont applicables aux Autres Services et en régissent l'utilisation.
                                L'Editeur pourra, lors de la mise à disposition des Autres Services, demander l'adhésion de l'Utilisateur à des conditions spécifique d'utilisation des Autres Services. L'Utilisateur s’engage à respecter strictement les conditions d’utilisation des Autres Services qui seront, le cas échéant, mis à sa disposition. A défaut, l'Utilisateur se verra refuser l’accès à l'Autre Service et ses fonctionnalités.
                            </p>
                        </li>
                    </ol>
                </p>

                <h3>DECLARATION DE L'UTILISATEUR</h3>
                <p>
                    <ol>
                        <li><b>L'Utilisateur s'engage :</b>
                            <ul>
                                <li>
                                    A ne procéder à aucun démarchage d'Utilisateurs à l'aide des information figurant sur la Plateforme de Sourcing et ce de quelque manière qu'il soit;
                                </li>
                                <li>
                                    A ne pas obtenir les adresses de courrier électronique des autres Utilisateurs ou de tiers en vue de réaliser des envois massifs de courrier électronique (ou ”Spam”), de réaliser des opérations d'envoi massif susvisées à partir de son Compte, ou d'effectuer toute autre opération pouvant nuire au fonctionnement normal du Site Internet, des Services, ou du Compte d'un autre Utilisateur;
                                </li>
                                <li>
                                    A n'exercer d'activités commerciales via le Site Internet ou les Services qu'en conformité avec la Règlementation;
                                </li>
                                <li>
                                    A respecter l'image et la réputation de l’Editeur et à ne pas se livrer à des déclarations et/ou des actions de nature à porter atteinte de quelque manière que ce soit à l’Editeur.
                                </li>
                            </ul>
                        </li>
                        <li>
                            L'Utilisateur s'engage à ne communiquer sur le Site Internet ou via les Services, que des informations exactes, conformes, lisibles et intelligibles et ne portant pas préjudice aux intérêts de Personnes tiers. Notamment, l'Utilisateur s'engage à se conformer et à respecter toute Règlementation. En particulier, il s'engage à ne publier et/ou diffuser aucun Contenu ou aucune information quelle que soit sa forme ou sa nature contenant des Eléments Illicites, ou indiquant une adresse Internet donnant accès à des Eléments Illicites
                        </li>
                        <li>
                            Est considéré comme un ”Elément Illicite”, tout message, publication, Contenu, produit, service ou toute forme d'information :
                            <ul>
                                <li>
                                    Contraire à l'ordre public et aux bonnes mœurs,
                                </li>
                                <li>
                                    Interdit à la vente, à la promotion, à la publicité selon la Règlementation,
                                </li>
                                <li>
                                    A caractère pornographique ou pédophile,
                                </li>
                                <li>
                                    Raciste, xénophobe, révisionniste, injurieux, diffamatoire, portant atteinte à l'honneur ou la réputation d'autrui, ou de nature à porter atteinte à la présomption d'innocence,
                                </li>
                                <li>
                                    incitant à la discrimination, à la haine d'une personne ou d'un groupe de personnes à raison de leur origine ou de leur appartenance ou de leur non-appartenance à une ethnie, une nation, une race ou une religion déterminée, menaçant une personne ou un groupe de personnes,
                                </li>
                                <li>
                                    incitant à commettre un délit, un crime ou un acte de terrorisme,
                                    faisant l'apologie des crimes de guerre ou des crimes contre l'humanité, ou niant leur existence,
                                    incitant au suicide,
                                </li>
                                <li>
                                    permettant à des tiers de se procurer directement ou indirectement des logiciels piratés, des numéros de série de logiciels, des moyens de paiement piratés, des numéros de moyen de paiement piraté, des logiciels permettant les actes de piratage et d'intrusion dans les systèmes informatiques et de télécommunication, des virus et autres bombes logiques et d'une manière générale tout outil logiciel ou autre permettant de porter atteinte aux droits d'autrui et à la sécurité des personnes et des biens, de nature à porter atteinte au respect de la vie privée, au caractère privé des correspondances et plus généralement aux droits des personnes et des biens usurpant l’identité d’autrui.
                                </li>
                            </ul>
                        </li>
                        <li>
                            L’Editeur supprimera de plein droit, sans préavis tout Contenu qu’il pourrait juger comme un Elément Illicite.
                        </li>
                        <li>
                            Si une Personne a de bonnes raisons de penser qu’un élément présent sur le Site Internet est un Elément Illicite, il devra en avertir immédiatement l’Editeur à l'adresse suivante : contact@showroomafrica.com
                        </li>
                        <li><b>OUVERTURE D'UN COMPTE : </b>
                            <ul>
                                <li>
                                    Pour ouvrir un Compte tout Utilisateur du Site Internet doit être une Personne âgée de plus de 18 ans et doit avoir le pouvoir de représenter l'entreprise titulaire du Compte. Seule une entreprise représentée par un Utilisateur peut être titulaire d'un Compte. L'Utilisateur doit (a) soit remplir le formulaire d'inscription avec l’ensemble des mentions obligatoires requises puis cliquer sur le bouton ”s’inscrire", valant acceptation des CGU pour le compte et au nom de l'entreprise titulaire du Compte, (b) soit utiliser la Messagerie ou le formulaire de contact et cliquer sur le bouton ”envoyer" un message, valant acceptation les CGU pour le compte et au nom de l'entreprise émetteur dudit message, (c) soit cliquer sur "Créer un compte utilisateur" dans le formulaire d’enregistrement de son entreprise, valant acceptation des CGU pour le compte et au nom de l’entreprise enregistrée. A cet instant, la Personne aura expressément accepté les termes et conditions des CGU, au nom et pour le compte de l'entreprise désignée pour être titulaire du Compte, mais aussi en son nom propre, et solidairement avec ladite entreprise. L'Utilisateur sera inscrit en sa qualité de représentant de l'entreprise titulaire du Compte, enregistré dans la Plateforme de Sourcing. L'Utilisateur dispose alors sur le Site Internet d’un accès lui permettant d'accéder à tout ou partie des Services.
                                </li>
                                <li>
                                    La signature électronique de l'Utilisateur lors de son acceptation des CGU, formalise la conclusion d’un contrat entre cette l'entreprise de l'Utilisateur et l'Editeur. Cette acceptation validée par la Personne par son ”clic” sur le bouton ”j’accepte" ou ”envoyer" ou "s’inscrire" ou "créer un compte utilisateur" ou tout autre bouton qui déclenche la création d’un Compte d'Utilisateur, constitue une acceptation irrévocable des présentes CGU, à l'instar d'une signature manuscrite.
                                </li>
                                <li>
                                    Seules les Personnes juridiquement capables de souscrire des contrats peuvent obtenir la qualité d'Utilisateur sur le Site Internet.
                                </li>
                                <li>
                                    Toute Personne qui ouvre un Comptes dans les conditions fixée par le présent Article est identifié par un identifiant et un mot de passe formant ensemble un Moyen d'Accès à son Compte qui lui permet de bénéficier des Services gratuits ou payants proposés par l'Editeur à partir du Site Internet.
                                </li>
                                <li>
                                    Chaque Utilisateur doit fournir à l'Editeur des Informations précises, complètes, exactes et à jour. L'Utilisateur n'est pas autorisé à (i) sélectionner ou utiliser l'identifiant d'une autre Personne avec l'intention de se faire passer pour cette Personne, (ii) utiliser un nom sujet aux droits d'une autre Personne sans autorisation, ou (iii) utiliser un identifiant que l'Editeur, à sa seule discrétion, juge inapproprié ou offensant. Le mot de passe permettant à l'Utilisateur de s'identifier et d’accéder au Site Internet, aux Services et aux Informations est personnel et confidentiel. L'Utilisateur s'engage à le conserver secret, à ne pas le divulguer sous quelque forme que ce soit.
                                </li>
                                <li>
                                    L’inobservation de l’une quelconque de ces stipulations constituera une infraction aux CGU, pouvant entraîner la suspension et/ou la résiliation immédiate du Compte, sans préavis ni indemnité ou compensation.
                                </li>
                                <li>
                                    L'Utilisateur devra utiliser son Compte conformément aux instructions raisonnables de l'Editeur, celles-ci pouvant être régulièrement modifiées. L'Utilisateur sera exclusivement responsable de la sécurité de son Moyen d'Accès. L'Utilisateur notifiera immédiatement à l'Editeur la perte, le vol ou le mauvais fonctionnement d'un Moyen d'Accès ou du fait qu’il a des raisons de croire qu'un Moyen d'Accès a été découvert. S’il estime que cela est nécessaire, l'Editeur pourra désactiver et remplacer immédiatement un Moyen d'Accès (ou demander à l'Utilisateur d’en choisir un nouveau). L'Editeur se réserve le droit de suspendre l'accès au Site Internet, au Comptes et/ou aux Services par l’intermédiaire de l’utilisation d’un Moyen d'Accès en cas de survenance de l'un des événements suivants, et ce jusqu'à ce que le Moyen d’Accès soit remplacé par l'Editeur ou que l'Utilisateur en ait choisi un autre (suivant le cas) ou, que le problème ayant entraîné la suspension soit résolu de manière satisfaisante pour l'Editeur : (i) l'Editeur reçoit une notification de l'Utilisateur telle que décrite ci-dessus; (ii) l'Editeur a des raisons légitimes de soupçonner qu'un Moyen d'Accès a été découvert; (iii) une Suspension de Service; (iv) l'Editeur a des raisons légitimes de croire que l'Utilisateur n'a pas respecté, ne respecte pas ou ne va pas respecter ses obligations découlant des CGU et/ou des CGV; (v) l'Editeur a une raison légitime pour suspendre l'accès par l’utilisation du Moyen d'Accès concerné.
                                </li>
                                <li>
                                    L'Utilisateur est responsable de tout accès à son Compte par son Moyen d’Accès et de toute utilisation d'un Service (consultations, modifications, offres, annonces, messages...) et du contrôle (a) de la fraude et de toute autre utilisation illégale de son Moyen d’Accès, (b) des modifications non autorisées et tout autre comportement non autorisé, et (c) de tout usage suspect ou autre activité suspecte à l’aide de son Moyen d’Accès.
                                </li>
                            </ul>
                        </li>
                    </ol>
                </p>

                <h3>DATE D’EFFET ET DURÉE DE VALIDITÉ DES CGU</h3>
                <ol>
                    <li>
                        <p>
                            Les CGU s’appliquent à l’Utilisateur dès qu’il accède au Site Internet.
                        </p>
                    </li>
                    <li>
                        <p>
                            Les CGU et les documents qui y sont visés, expriment ensemble l’intégralité des accords entre les Parties quant à leur objet et remplace et annule toutes conventions correspondances ou documents antérieurs que les Parties ont pu conclure ou se communiquer et ayant un objet identique ou similaire.
                        </p>
                    </li>
                    <li>
                        <p>
                            Les CGU et les documents qui y sont visés, constituent le seul accord entre les Parties quant à l'objet défini ci-dessus.
                        </p>
                    </li>
                    <li>
                        <p>
                            Les Parties ne seront pas engagées par les déclarations, clauses ou modalités qui se rapportent à celui-ci et qui n'y auraient pas été incorporées ou dans les documents qui y sont prévus.
                        </p>
                    </li>
                    <li>
                        <p>
                            Les CGU peuvent être modifiées unilatéralement à tout moment par l'Editeur, qui en informera préalablement l'Utilisateur titulaire d'un Compte. Dans ce cas, les modifications apportées au CGU entrent en vigueur à compter de l'information donnée à l'Utilisateur par l'Editeur. En cas de refus par l'Utilisateur des nouvelles CGU, celui-ci pourra résilier son Compte et ne devra plus utiliser les Services, la Plateforme de Sourcing et le Site Internet. Pour les autres Utilisateurs non titulaires d'un Compte, les CGU entrent en vigueur immédiatement à compter de leur publication sur le Site Internet.
                        </p>
                    </li>
                </ol>

                <h3>SUSPENSION DE SERVICE</h3>
                <ol>
                    <li>
                        <p>
                            L'Editeur pourra suspendre ou bloquer immédiatement et sans préavis, l'accès à un ou à tous les Services (chaque cas étant ci-après individuellement désigné "Suspension du Service") pour l'un des besoins suivants : a) se conformer à toute Règlementation, décision de justice ou autre demande administrative ou injonction exigeant une action immédiate ; b) se conformer à la politique éditoriale de l'Editeur telle qu’elle est mentionnée sur le Site Internet, c) éviter toute interférence pouvant créer un dommage (y compris aux autres Utilisateurs) ou une dégradation des performances du Site Internet ; d) éviter que le Service concerné soit utilisé d’une façon qui engagerait ou pourrait engager la responsabilité de l'Editeur, ou en violation à toute Réglementation, que cette utilisation soit faite par l'Utilisateur ou toute autre personne ou entité utilisant le Service, avec ou sans le consentement ou l’autorisation de l'Utilisateur, ou éviter que le Service ne soit utilisé abusivement par l'Utilisateur, ces cas d’utilisation étant ci-après individuellement désignés "Mauvaise Utilisation du Service"; e) éviter toute perte lorsque l'Utilisateur ne paye pas l’un des montants dus à l'Editeur à sa date d’échéance
                        </p>
                    </li>
                    <li>
                        <p>
                            L'Editeur rétablira la fourniture du Service à condition que l'Utilisateur remédie à la cause de la Suspension du Service et qu'il paie le cas échéant à l'Editeur les frais éventuels de rétablissement du Service. Si l'Utilisateur ne remédie pas à la cause de la Suspension du Service ou ne paie pas le cas échéant les frais de rétablissement du Service, l'Editeur pourra supprimer le Compte de l'Utilisateur, sans indemnité ni préavis. Dans ce cas, l'Editeur pourra (sans préjudice de l'exercice de ses autres droits et recours) réclamer à l'Utilisateur le paiement des montants dus au titre des abonnements souscrit par l'Utilisateur préalablement à la date de suppression de son Compte.
                        </p>
                    </li>
                </ol>

                <h3>LIMITATION DE RESPONSABILITE</h3>
                <ol>
                    <li>
                        <p>
                            Dans le cadre de l'exécution des CGU, l'Editeur veille à mettre en œuvre les moyens techniques d'intervention et d'assistance en vue d'assurer un fonctionnement régulier du Site Internet et des Services.
                        </p>
                    </li>
                    <li>
                        <p>
                            L'Editeur ne pourra être tenu responsable des retards ou inexécutions de ses obligations contractuelles résultant de la survenance d'événements échappant raisonnablement à son contrôle, tels que notamment les événements suivants : fait du prince, perturbations météorologiques exceptionnelles, conflits du travail autres que ceux opposant l'Editeur à ses salariés, absence ou suspension de la fourniture d'électricité, foudre ou incendie, décision d'une autorité administrative nationale ou internationale ou de toute autre autorité compétente, guerre, troubles publics, actes ou omissions de la part d’un opérateur de télécommunications, ou d'un prestataire tiers, ou événements hors du contrôle raisonnable des fournisseurs de l'Editeur.
                        </p>
                    </li>
                    <li>
                        <p>
                            L'Editeur ne garantit pas que son Site Internet ou ses Services fonctionnent et fonctionneront sans aucune discontinuité. En cas de défaillance de son Site Internet ou de ses Services, l'Editeur informera l'Utilisateur de la défaillance en cause et fera ses meilleurs efforts pour remédier à cette défaillance dans les meilleurs délais.
                        </p>
                    </li>
                    <li>
                        <p>
                            L'Editeur ne sera pas responsable, à quelque titre que ce soit, des dommages suivants : 
                            <ul>
                                <li>
                                    perte de revenus, d’activité, de contrats, de clientèle, d’économies, de profits ou de données - les termes "perte d'économies" signifient une quelconque dépense que l'Utilisateur s'attend à éviter ou bien à supporter à un moindre coût grâce à l'utilisation du Site Internet ou des Services;
                                </li>
                                <li>
                                    ou un quelconque dommage indirect pouvant survenir dans le cadre de l’exécution des CG
                                </li>
                            </ul> 
                        </p>
                    </li>
                </ol>

                <h3>RENONCIATION</h3>
                <ol>
                    <li>
                        <p>
                            Le défaut d’exercice par une Partie d'un droit au titre des CGU ne pourra en aucun cas être interprété comme une renonciation à ce droit et n'affectera en aucune manière la faculté de cette Partie de l'exercer.
                        </p>
                    </li>
                    <li>
                        <p>
                            Aucune renonciation à une déclaration ou garantie contractuelle ne sera effective sans une déclaration écrite et signée de la Partie concernée notifiant à l'autre Partie sa renonciation.
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