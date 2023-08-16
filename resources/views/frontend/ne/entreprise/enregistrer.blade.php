@include('frontend.ne.header.header')
@include('frontend.ne.header.header1')
@include('frontend.ne.header.header2')
@include('frontend.ne.header.header3')
@include('frontend.ne.header.header4')
@include('frontend.ne.header.header5')
@include('frontend.ne.header.header6')
@include('frontend.ne.header.header7')
@include('frontend.ne.header.header8')
@include('frontend.ne.header.header9')
@include('frontend.ne.navbar')

<!-- CONTAINER -->
<div class="container">
      <div class="form-container bkg">
            <div class="form form-company">
                  <span class="title">Enregistrer votre entreprise</span>
                  @if(Session::has('entreprise'))
                        <div class="alert alert-success" role="alert">{{Session::get('entreprise') }}</div>
                  @endif
                  <form action="{{ route('entreprise.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="fields">
                              <div class="input-field field2">
                                    <select class="form-select" name="souscategorie_id">
                                          <option class="placeholder" value="" disabled selected>Secteur d'activité</option>
                                          @foreach ($souscategories as $souscategorie)
                                                <option value="{{ $souscategorie->id }}">{{ $souscategorie->libelle }}</option>
                                          @endforeach
                                    </select>
                                    <i class="fa-light fa-briefcase"></i>
                              </div>
                              <div class="input-field field2">
                                    <input type="text" placeholder="Raison soneale" required name="nom" >
                                    <i class="fa-light fa-building"></i>
                              </div>
                              {{-- <div class="input-field field2">
                                    <input type="text" placeholder="Statut de l'entreprise" name="statu">
                                    <i class="fa-light fa-book"></i>
                              </div> --}}
                              <div class="input-field field2">
                                    <input type="email" placeholder="E-mail de l'entreprise" name="email">
                                    <i class="fa-light fa-envelope"></i>
                              </div>
                              <div class="input-field field2">
                                    <input type="text" placeholder="Votre adresse ine" required name="adresse">
                                    <i class="fa-light fa-map-location-dot"></i>
                              </div>
                              <div class="input-field field2">
                                    <input type="text" placeholder="Numéro de téléphone 1" required name="telephone1">
                                    <i class="fa-light fa-phone"></i>
                              </div>
                              <div class="input-field field2">
                                    <input type="text" placeholder="Numéro de téléphone 2" name="telephone2">
                                    <i class="fa-light fa-phone"></i>
                              </div>
                              </div>

                              <div class="fields">
                              <div class="input-field field2">
                                    <input type="text" placeholder="Numéro de téléphone 3"  name="telephone3">
                                    <i class="fa-light fa-phone"></i>
                              </div>
                              <div class="input-field field2">
                                    <input type="text" placeholder="Numéro de téléphone 4"  name="telephone4">
                                    <i class="fa-light fa-phone"></i>
                              </div>
                              <div class="input-field field2">
                                    <input type="text" placeholder="Site web de l'entreprise"  name="siteweb">
                                    <i class="fa-light fa-globe"></i>
                              </div>
                              {{-- <div class="input-field field2">
                                    <select class="form-select" name="pays">
                                          <option class="placeholder" value="" disabled selected>Sélectionnez le pays</option>
                                          @foreach ($pays as $pay)
                                                <option value="{{ $pay->libelle }}">{{ $pay->libelle }}</option>
                                          @endforeach
                                    </select>
                                    <i class="fa-light fa-flag"></i>
                              </div>
                              <div class="input-field field2">
                                    <select class="form-select" name="ville">
                                          <option class="placeholder" value="" disabled selected>Sélectionnez la ville</option>
                                          @foreach ($villes as $ville)
                                                <option>{{ $ville->libelle }}</option>
                                          @endforeach
                                    </select>
                                    <i class="fa-light fa-nety"></i>
                              </div> --}}
                        </div>

                        <div class="input-field-upload">
                        <figure class="image-container">
                              <img id="chosen-image">
                              <figcaption id="file-name"></figcaption>
                        </figure>

                        <input type="file" id="upload-button" accept="image/*" name="logo">
                        <label for="upload-button">
                              <i class="fa-solid fa-image"></i> &nbsp; Importer le logo
                        </label>
                        </div>

                        <div class="input-field">
                        <textarea rows="3" placeholder="Description de l'entreprise" name="descriptionCourte"></textarea>
                        <i class="fa-light fa-file-lines"></i>
                        </div>

                        <div class="input-field button" id="s_button">
                        <input type="submit" value="Enregistrer">
                        </div>
                  </form>
            </div>

      </div>

</div>
<!-- END CONTAINER -->
<script src="{{ asset('assets/js/upload.js') }}"></script>
@include('frontend.ne.footer.footer')
@include('frontend.ne.footer.footer2')
@include('frontend.ne.footer.footer3')