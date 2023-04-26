@include('frontend.header.header')
@include('frontend.header.header1')
@include('frontend.header.header2')
@include('frontend.header.header3')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<link rel="stylesheet" href="{{ asset('assets/css/commentaire.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/annonce.css') }}" />

@include('frontend.header.header4')
@include('frontend.header.header5')
@include('frontend.header.header6')
@include('frontend.header.header7')
@include('frontend.header.header8')
<body>
    
@include('frontend.navbar')

<div class="container">

    <!-- ADVERTORIAL -->
    <div class="section-one white-bkg" id="annonce">
        @foreach ($annonces as $annonce)
            <h1>{{ $annonce->titre }}</h1>
        @endforeach
        <div class="service-details">
            
            <div class="section-text">
                @foreach ($annonces as $annonce)
                    {{-- <h3>Création de site web</h3> --}}
                    <p>
                        {{$annonce->text1}}
                    </p>
                    <br />

                    {{-- <h3>Refonte de site web</h3> --}}
                    <img src="{{ asset('assets/images/advertorial') }}/{{ $annonce->image1 }}" width="100%">
                    <br />
                    <br />
                    <p>
                        {{$annonce->text2}}
                    </p>
                    <br />
                    <img src="{{ asset('assets/images/advertorial') }}/{{ $annonce->image2 }}" width="100%">
                    <br/>
                    <br/>
                    <p>
                        {{$annonce->text3}}
                    </p>
                    <article>
                        <br>
                        <hr>
                        <h3>Les commentaires</h3>
                        {{-- @if(Session::has('comment'))
                            <div class="alert alert-success" role="alert">{{Session::get('comment') }}</div>
                        @endif --}}
                        <form action="{{ route('annonce.commentaire',['annonce_id'=>$annonce->id]) }}" method="POST">
                            @csrf
                            <div class="input-box">
                                <input type="text" placeholder="Votre pseudo" required name="pseudo">
                            </div>
                            {{-- <div class="input-box">
                                <input type="email" placeholder="Nom et prénom(s)" required name="email">
                            </div> --}}
    
                            <div class="input-box message-box">
                                <textarea placeholder="Votre message" name="commentaire"></textarea>
                            </div>
                            <div class="button">
                                <input type="submit" value="Envoyer" />
                            </div>
                        </form>
                        <br />
                        <hr />
                    </article>

                    <br>
                    <section class="review" id="review">
                        <div class="review-commentaires">
                            <div class="wrapper">
                                @foreach ($commentaires as $commentaire)
                                    <div class="commentaires">
                                        <div class="user">
                                            <img src="{{ asset('assets/images/user.png') }}" alt="">
                                            <div class="user-info">
                                                <h3>{{ $commentaire->pseudo }}</h3>
                                            </div>
                                        </div>
                                        <p>{{$commentaire->commentaire}}</p>
                    
                                        <div class="time">
                                            <span>{{ $commentaire->created_at->diffForHumans() }}</span> 
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @endforeach
                
                

            </div>
            
            <div class="section-annonce">
                @foreach ($annonces as $annonce)
                    @if ($annonce->image3)
                        <video src="{{ asset('assets/videos') }}/{{ $annonce->image3 }}" autoplay muted controls></video>
                    @endif
                    <br />
                    <br />
                @endforeach

            <h3>Actualités récentes</h3>
                <div class="slider">
                    @foreach ($actualites as $actualite)
                        <div class="img-div"><img src="{{ asset('assets/images/advertorial') }}/{{ $actualite->image1 }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- END ADVERTORIAL -->

</div>

@include('frontend.footer.footer')
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('assets/js/annonce.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
@include('frontend.footer.footer1')
@include('frontend.footer.footer2')
@include('frontend.footer.footer3')