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
    <div class="annonce-one white-bkg" id="annonce">
        @foreach ($annonces as $annonce)
            <h1>{{ $annonce->titre }}</h1>
        @endforeach
        <div class="annonce-details">
            
            <div class="annonce-text">
                @foreach ($annonces as $annonce)
                    <p>
                        {{$annonce->text1}}
                    </p>
                    <br />
                    @if ($annonce->image1)
                        <img src="{{ asset('assets/images/annonce/images') }}/{{ $annonce->image1 }}" width="100%">
                        <br />
                        <br />
                    @endif
                    <p>
                        {{$annonce->text2}}
                    </p>
                    <br />
                    @if ($annonce->image2)
                        <img src="{{ asset('assets/images/annonce/images') }}/{{ $annonce->image2 }}" width="100%">
                        <br/>
                        <br/>
                    @endif
                    
                    <p>
                        {{$annonce->text3}}
                    </p>
                    <article>
                        <br>
                        <hr>
                        <h3>Les commentaires</h3>
                        <form action="{{ route('annonce.commentaire',['annonce_id'=>$annonce->id]) }}" method="POST">
                            @csrf
                            <div class="input-box">
                                <input type="text" placeholder="Votre pseudo" required name="pseudo">
                            </div>
                        
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
                                            <span>@php
                                                echo \Carbon\Carbon::parse($commentaire->created_at)->diffForHumans(null, false, 'fr');
                                            @endphp</span> 
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
                        <video src="{{ asset('assets/images/annonce/videos') }}/{{ $annonce->image3 }}" autoplay muted controls></video>
                    @endif
                    <br />
                    <br />
                @endforeach

                <h3>Actualités récentes</h3>
                <div class="slider">
                    @foreach ($actualites as $actualite)
                        @if ($actualite->image1)
                            <a href="{{ route('annonce',['annonce_id'=>$actualite->id]) }}">
                                <div class="img-div"><img src="{{ asset('assets/images/annonce/images') }}/{{ $actualite->image1 }}"></div>
                            </a>
                        @endif
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