@include('frontend.header.header')
@include('frontend.header.header1')
@include('frontend.header.header2')
@include('frontend.header.header3')
@include('frontend.header.header4')
@include('frontend.header.header5')
@include('frontend.header.header6')
@include('frontend.header.header7')
@include('frontend.header.header8')
@include('frontend.header.header9')

@include('frontend.navbar')

<div class="container">

    <div class="map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.701238777434!2d1.1834649!3d6.2074975!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x13525f005439bec7!2sShowroom%20Africa!5e0!3m2!1sfr!2stg!4v1671102033967!5m2!1sfr!2stg"
        height="360" style="border:0;" allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>

    <div class="form-container">

      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fa-light fa-location-dot"></i>
            <div class="topic">Adresse</div>
            <div class="text-one">Derrière la pharmacie <b>Laus Deo</b></div>
            <div class="text-two">Avédji, Lomé-TOGO </div>
          </div>
          <div class="phone details">
            <i class="fa-light fa-phone"></i>
            <div class="topic">Téléphone</div>
            <div class="text-one">(+228) <b>92 22 94 33</b></div>
            <div class="text-two">(+228) <b>99 41 64 21</b></div>
          </div>
          <div class="email details">
            <i class="fa-light fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">contact@showroomafrica.com</div>
          </div>
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
  @include('frontend.footer.footer')
  <script src="{{ asset('assets/js/script.js') }}"></script>
  @include('frontend.footer.footer1')
  @include('frontend.footer.footer2')
  @include('frontend.footer.footer3')
