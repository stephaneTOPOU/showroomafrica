@include('frontend.bf.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/bf/professionnel" />
@include('frontend.bf.header.header1')
@include('frontend.bf.header.header2')
@include('frontend.bf.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />

@include('frontend.bf.header.header4')
@include('frontend.bf.header.header5')
@include('frontend.bf.header.header6')
@include('frontend.bf.header.header7')
@include('frontend.bf.header.header8')
@include('frontend.bf.header.header9')

@include('frontend.bf.navbar')

<div class="container">

    <div class="pro-container">

      <div class="professionals-list">
        <h2>Professionnels</h2>

        <div class="professionals">
          @foreach ($professionels as $professionel)
            <div class="professional-info">
              <div class="left">
                <h3>{{ $professionel->prenoms }} <b>{{ $professionel->name }}</b></h3>
                <ul>
                  @if ($professionel->adresse)
                    <li><i class="fa-light fa-location-dot"></i> {{ $professionel->adresse }}</li>
                  @endif
                  @if ($professionel->fonction)
                    <li><i class="fa-light fa-briefcase"></i> <b>{{ $professionel->fonction }}</b></li>
                  @endif
                </ul>
              </div>

              <div class="right">
                <a href="#">CV</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>

  @include('frontend.bf.footer.footer')
  <script src="{{ asset('assets/js/script.js') }}"></script>
  @include('frontend.bf.footer.footer1')
  @include('frontend.bf.footer.footer2')
  @include('frontend.bf.footer.footer3')