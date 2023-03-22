@include('frontend.tg.header.header')
@include('frontend.tg.header.header1')
@include('frontend.tg.header.header2')
@include('frontend.tg.header.header3')
@include('frontend.tg.header.header4')
@include('frontend.tg.header.header5')
@include('frontend.tg.header.header6')
@include('frontend.tg.header.header7')
@include('frontend.tg.header.header8')
@include('frontend.tg.header.header9')

@include('frontend.tg.navbar')

<div class="container">

    <div class="map">
      @foreach ($parametres as $parametre)
        <iframe
          src="{{ $parametre->geolocalisation }}"
          height="360" style="border:0;" allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>                                     
      @endforeach
    </div>

    <div class="form-container">

      <div class="content">
        <div class="left-side">
          @foreach ($parametres as $parametre)
            <div class="address details">
              <i class="fa-light fa-location-dot"></i>
              <div class="topic">Adresse</div>
              <div class="text-one">Derrière la pharmacie <b>Laus Deo</b></div>
              <div class="text-two">{{ $parametre->adresse }}</div>
            </div>
            <div class="phone details">
              <i class="fa-light fa-phone"></i>
              <div class="topic">Téléphone</div>
              <div class="text-one">(+228) <b>{{ $parametre->telephone1 }}</b></div>
              <div class="text-two">(+228) <b>{{ $parametre->telephone2 }}</b></div>
            </div>
            <div class="email details">
              <i class="fa-light fa-envelope"></i>
              <div class="topic">Email</div>
              <div class="text-one">{{ $parametre->email }}</div>
            </div>
          @endforeach
        </div>
        <div class="right-side">
          <div class="topic-text">Envoyez-nous un message</div>
          <p>Faites-nous part de toutes vos préoccupations, suggestions ou propositions de partenariat</p>
          @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{Session::get('success') }}</div>
          @endif
          <form action="{{ route('contact.save') }} " method="POST">
            @csrf
            <div class="input-box">
                <input type="text" placeholder="Nom et prénom(s)" required name="nom">
            </div>
            <div class="input-box">
                <input type="email" placeholder="Votre e-mail" required name="email">
            </div>
            <div class="input-box">
                <input type="text" placeholder="Objet de votre mail" required name="objet">
            </div>
            <div class="input-box message-box">
              <textarea placeholder="Votre message" name="message"></textarea>
            </div>
            <div class="button">
              <input type="submit" value="Envoyer" />
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>
  @include('frontend.tg.footer.footer')
  <script src="{{ asset('assets/js/script.js') }}"></script>
  @include('frontend.tg.footer.footer1')
  @include('frontend.tg.footer.footer2')
  @include('frontend.tg.footer.footer3')
