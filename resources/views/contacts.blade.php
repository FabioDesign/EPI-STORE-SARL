@extends('master')

@section('content')
  <!-- breadcrumb -->
  <div class="site-breadcrumb"
    style="background: url(assets/img/breadcrumb.jpg)">
    <div class="container">
      <h2 class="breadcrumb-title">{{ $titre }}</h2>
      <ul class="breadcrumb-menu">
        <li><a href="/">Accueil</a></li>
        <li class="active">{{ $currentMenu }}</li>
      </ul>
    </div>
  </div>
  <!-- breadcrumb end -->
  <!-- contact area -->
  <div class="contact-area py-120">
    <div class="container">
      <div class="contact-content">
        <div class="row">
          <div class="col-md-3">
            <div class="contact-info">
              <div class="icon">
                <i class="fal fa-alarm-clock"></i>
              </div>
              <div class="content">
                <h5>Ouverture</h5>
                <p>{{ config('opening') }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="contact-info">
              <div class="icon">
                <i class="fal fa-phone-volume"></i>
              </div>
              <div class="content">
                <h5>Téléphone</h5>
                <p>{{ config('phone') }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="contact-info">
              <div class="icon">
                <i class="fal fa-envelopes"></i>
              </div>
              <div class="content">
                <h5>Email</h5>
                <p>{{ config('email') }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="contact-info">
              <div class="icon">
                <i class="fal fa-map-location-dot"></i>
              </div>
              <div class="content">
                <h5>Localisation</h5>
                <p>{{ config('address') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="contact-form-wrap">
        <div class="row g-4">
          <div class="col-lg-5">
            <div class="contact-img">
              <img src="assets/img/contact.jpg" alt>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="contact-form">
              <div class="contact-form-header">
                <h2>Nous écrire</h2>
                <p>
                  Merci de nous envoyer vos avis et suggestions.
                </p>
              </div>
              <div class="form-message"></div>
              <form id="contact-form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-icon">
                        <i class="far fa-user-tie"></i>
                        <input type="text" name="username" class="form-control username" maxlength="50" placeholder="Nom Complet">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-icon">
                        <i class="far fa-envelope"></i>
                        <input type="text" name="email" class="form-control email" maxlength="50" placeholder="Email">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-icon">
                    <i class="far fa-pen"></i>
                    <input type="text" name="subject" class="form-control subject" maxlength="50" placeholder="Objet">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-icon">
                    <i class="far fa-comment-lines"></i>
                    <textarea name="comment" cols="30" rows="5" class="form-control comment" placeholder="Votre message"></textarea>
                  </div>
                </div>
                <button type="submit" class="theme-btn submit-btn">Envoyer message <i class="far fa-paper-plane"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end contact area -->
  <!-- map -->
  <div class="contact-map">
    <iframe src="{{ config('map') }}" style="border:0;" allowfullscreen loading="lazy"></iframe>
  </div>
  <!-- map end -->
@endsection