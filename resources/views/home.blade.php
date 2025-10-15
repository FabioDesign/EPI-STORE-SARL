@extends('master')

@section('content')
  <!-- hero area -->
  <div class="hero-section">
    <div class="hero-slider owl-carousel">
      @foreach($sliders as $slider)
      <div class="hero-single"
        style="background-image: url(assets/img/sliders/{{ $slider->filename }});">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 col-lg-8 mx-auto">
              <div class="hero-content text-center">
                <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s" style="text-transform: none;">{!! $slider->libelle !!}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="process-area py-40">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="site-heading text-center wow fadeInDown"
            data-wow-delay=".25s">
            <span class="site-title-tagline">
              <i class="far fa-solar-panel"></i>
              Nos services
            </span>
            <h2 class="site-title"></h2>
            <div class="heading-divider"></div>
          </div>
        </div>
      </div>
      
      <div class="shop-item-wrap">
        <div class="row g-4 align-items-center">
          <div class="shop-slider owl-carousel">
            @foreach($imghomes as $imghome)
            <div class="shop-item">
              <div class="shop-item-img">
                <img src="assets/img/homes/{{ $imghome->filename }}" alt>
                <div class="shop-item-meta" style="top: 15px;">
                  <a href="#"><i class="far fa-heart"></i></a>
                  <a href="#"><i class="far fa-eye"></i></a>
                  <a href="#"><i class="far fa-shopping-cart"></i></a>
                </div>
              </div>
              <div class="shop-item-info">
                <a href="#">
                  <h4 class="shop-item-title">{!! $imghome->libelle !!}</h4>
                </a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="choose-area py-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="choose-content wow fadeInUp" data-wow-delay=".25s">
            <div class="site-heading mb-0">
              <span class="site-title-tagline"><i
                  class="fas fa-solar-panel"></i> EPISTORE SARL</span>
              <h2 class="site-title">Notre mission</h2>
              <p>
                La prévention des risques dans le cadre du travail. Nous avons choisi une gamme complète de produits d'équipement de protection individuelle EPI et de vêtements de travail pour tous les types de métiers.<br>
                Notre boutique en ligne s'adresse aux entreprises qui souhaitent équiper leurs employés, aux artisans, aux auto-entrepreneurs ...<br>
                Les particuliers qui désirent se protéger pour leurs travaux personnels, peuvent également passer commande sur le site.<br>
                Professionnels, nous aidons nos clients dans l'identification  des risques et proposons l'équivalent adapté.<br><br>
                Merci de nous faire confiance. 
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="choose-img wow fadeInRight" data-wow-delay=".25s">
            <img class="img-1" src="assets/img/choose/01.jpg" alt>
            <img class="img-2" src="assets/img/choose/02.jpg" alt>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="feature-area2 py-40">
    <div class="container">
      <div class="feature-wrap">
        <div class="row g-4">
          <div class="col-md-6 col-lg-4">
            <div class="feature-item">
              <span class="count">01</span>
              <div class="feature-icon">
                <img src="assets/img/icon/support.svg" alt>
              </div>
              <div class="feature-content">
                <h4>Serviec client</h4>
                <p>
                  Un service client à votre écoute du lundi au vendredi de
                  08h00 à 12h00 et de 14h00 à 18h00
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="feature-item">
              <span class="count">02</span>
              <div class="feature-icon">
                <img src="assets/img/icon/money.svg" alt>
              </div>
              <div class="feature-content">
                <h4>Demande de proforma</h4>
                <p>
                  Possibilité d'avoir un devis en ligne après le choix de vos articles.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="feature-item">
              <span class="count">03</span>
              <div class="feature-icon">
                <img src="assets/img/icon/staff.svg" alt>
              </div>
              <div class="feature-content">
                <h4>Livraison</h4>
                <p>
                  Livraison rapide chez nos clients ou en entreprise,
                  à Abidjan, à l'intérieur ou à l'extérieur.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection