@include('frontend.ci.header.header')
<meta property="og:url" content="https://www.showroomafrica.com/ci/professionnel" />
@include('frontend.ci.header.header1')
@include('frontend.ci.header.header2')
@include('frontend.ci.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />

@include('frontend.ci.header.header4')
@include('frontend.ci.header.header5')
@include('frontend.ci.header.header6')
@include('frontend.ci.header.header7')
@include('frontend.ci.header.header8')
@include('frontend.ci.header.header9')

@include('frontend.ci.navbar')

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

  @include('frontend.ci.footer.footer')
  <script src="{{ asset('assets/js/script.js') }}"></script>
  @include('frontend.ci.footer.footer1')
  @include('frontend.ci.footer.footer2')
  @include('frontend.ci.footer.footer3')