@include('frontend.header')
@include('frontend.navbar')

<!-- CONTAINER -->
<div class="container">
      <div class="form-container bkg">
         <div class="form form-company">
               <span class="title">Enregistrer votre entreprise</span>
               <form action="#">
                  <div class="fields">
                     <div class="input-field field2">
                           <input type="text" placeholder="Raison sociale" required>
                           <i class="fa-light fa-building"></i>
                     </div>
                     <div class="input-field field2">
                           <input type="text" placeholder="Statut de l'entreprise" required>
                           <i class="fa-light fa-book"></i>
                     </div>
                     <div class="input-field field2">
                           <input type="email" placeholder="E-mail de l'entreprise" required>
                           <i class="fa-light fa-envelope"></i>
                     </div>
                     <div class="input-field field2">
                           <input type="text" placeholder="Votre adresse ici" required>
                           <i class="fa-light fa-map-location-dot"></i>
                     </div>
                     <div class="input-field field2">
                           <input type="text" placeholder="Numéro de téléphone 1" required>
                           <i class="fa-light fa-phone"></i>
                     </div>
                     <div class="input-field field2">
                           <input type="text" placeholder="Numéro de téléphone 2" required>
                           <i class="fa-light fa-phone"></i>
                     </div>
                  </div>

                  <div class="fields">
                     <div class="input-field field2">
                           <input type="text" placeholder="Numéro de téléphone 3" required>
                           <i class="fa-light fa-phone"></i>
                     </div>
                     <div class="input-field field2">
                           <input type="text" placeholder="Numéro de téléphone 4" required>
                           <i class="fa-light fa-phone"></i>
                     </div>
                     <div class="input-field field2">
                           <input type="text" placeholder="Site web de l'entreprise" required>
                           <i class="fa-light fa-globe"></i>
                     </div>
                     <div class="input-field field2">
                           <select class="form-select">
                              <option class="placeholder" value="" disabled selected>Sélectionnez le pays</option>
                              <option value="TG">Togo</option>
                              <option value="BN">Bénin</option>
                              <option value="CIV">Côte d'Ivoire</option>
                              <option value="BF">Burkina Faso</option>
                           </select>
                           <i class="fa-light fa-flag"></i>
                     </div>
                     <div class="input-field field2">
                           <select class="form-select">
                              <option class="placeholder" value="" disabled selected>Sélectionnez la ville</option>
                              <option>Lomé</option>
                              <option>Kara</option>
                              <option>Dapaong</option>
                              <option>Kpalimé</option>
                              <option>Cotonou</option>
                              <option>Porto-Novo</option>
                              <option>Abidjan</option>
                              <option>Ouagadougou</option>
                           </select>
                           <i class="fa-light fa-city"></i>
                     </div>
                     <div class="input-field field2">
                           <select class="form-select">
                              <option class="placeholder" value="" disabled selected>Secteur d'activité</option>
                              <option>Graphisme</option>
                              <option>Arts visuels</option>
                              <option>Dropshipping</option>
                              <option>Maison de production</option>
                              <option>Bar / Restaurant</option>
                              <option>Supermarché</option>
                           </select>
                           <i class="fa-light fa-briefcase"></i>
                     </div>
                  </div>

                  <div class="input-field-upload">
                     <figure class="image-container">
                           <img id="chosen-image">
                           <figcaption id="file-name"></figcaption>
                     </figure>

                     <input type="file" id="upload-button" accept="image/*">
                     <label for="upload-button">
                           <i class="fa-solid fa-image"></i> &nbsp; Importer le logo
                     </label>
                  </div>

                  <div class="input-field">
                     <textarea rows="3" placeholder="Description de l'entreprise"></textarea>
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
@include('frontend.footer')