@include('frontend.cm.header.header')
@include('frontend.cm.header.header1')
@include('frontend.cm.header.header2')
@include('frontend.cm.header.header3')

<link rel="stylesheet" href="{{ asset('assets/css/slider.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/professionals.css') }}" />

@include('frontend.cm.header.header4')
@include('frontend.cm.header.header5')
@include('frontend.cm.header.header6')
@include('frontend.cm.header.header7')
@include('frontend.cm.header.header8')
@include('frontend.cm.header.header9')

@include('frontend.cm.navbar')

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

  @include('frontend.cm.footer.footer')
  <script src="{{ asset('assets/js/script.js') }}"></script>
  @include('frontend.cm.footer.footer1')
  @include('frontend.cm.footer.footer2')
  @include('frontend.cm.footer.footer3')