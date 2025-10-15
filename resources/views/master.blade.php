<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content>
    <meta name="keywords" content>
	  <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title -->
    <title>EPI STORE SARL - {{ $titre }}</title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
  </head>
  <body class="home-2">
    <!-- preloader -->
    <div class="preloader">
      <div class="loader-ripple">
        <div></div>
        <div></div>
      </div>
    </div>
    <!-- preloader end -->
    <!-- header area -->
    <header class="header">
      <!-- header top -->
      <div class="header-top">
        <div class="shape">
          <div class="shape-1"></div>
          <div class="shape-2"></div>
        </div>
        <div class="container">
          <div class="header-top-wrap">
            <div class="header-top-left">
              <div class="header-top-list">
                <ul>
                  <li>
                    <a href="#">
                      <i class="far fa-envelopes"></i>{{ config('email') }}
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="far fa-phone-volume"></i>{{ config('phone') }}
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="far fa-alarm-clock"></i>{{ config('opening') }}
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="header-top-right">
              <div class="header-top-list">
                <a href="#">
                  <i class="far fa-sign-in"></i> Login
                </a>
              </div>
              <div class="header-top-social">
                <span>Suivez-nous:</span>
                <a href="https://web.facebook.com/epistoresarl/" target="_blank">
                  <i class="fab fa-facebook"></i>
                </a>
                <a href="#">
                  <i class="fab fa-x-twitter"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- header top end -->
      <!-- navbar -->
      <div class="main-navigation">
        <nav class="navbar navbar-expand-lg">
          <div class="container position-relative">
            <a class="navbar-brand" href="/">
              <img src="assets/img/logo.png" alt="logo">
            </a>
            <div class="mobile-menu-right">
              <div class="mobile-menu-btn">
                <button type="button" class="nav-right-link search-box-outer">
                  <i class="far fa-search"></i>
                </button>
              </div>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar"
                aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>
            <div
              class="offcanvas offcanvas-start"
              tabindex="-1"
              id="offcanvasNavbar"
              aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <a href="/" class="offcanvas-brand"
                  id="offcanvasNavbarLabel">
                  <img src="assets/img/logo.png" alt>
                </a>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="offcanvas"
                  aria-label="Close">
                  <i class="far fa-xmark"></i>
                </button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1">
                  <li class="nav-item">
                    <a class="nav-link @php echo $currentMenu == 'home' ? 'active':'' @endphp" href="/">Accueil</a>
                  </li>
                  @foreach($menus as $menu)
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle @php echo $currentMenu == $menu['code'] ? 'active':'' @endphp" href="{{ $menu['target'] }}" data-bs-toggle="dropdown">{{ $menu['libelle'] }}</a>
                    @if ($menu['submenus']->isNotEmpty())
                      <ul class="dropdown-menu fade-down">
                        @foreach($menu['submenus'] as $submenu)
                          <li>
                            <a class="dropdown-item" href="/shops?code={{ $submenu['code'] . "&num=1" . $submenu['target'] }}">{{ $submenu['libelle'] }}</a>
                          </li>
                        @endforeach
                      </ul>
                    @endif
                  </li>
                  @endforeach
                </ul>
                <!-- nav-right -->
                <div class="nav-right">
                  <div class="search-btn">
                    <button type="button"
                      class="nav-right-link">
                      <i class="far fa-search"></i>
                    </button>
                  </div>
                  <div class="shop-cart">
                    <a href="/shopcart" class="nav-right-link">
                      <i class="far fa-shopping-cart"></i>
                      <span id="shopcart">0</span>
                    </a>
                  </div>
                  <div class="nav-btn">
                    <a href="/contact" class="theme-btn">Contacts
                      <i class="fas fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <!-- navbar end-->
    </header>
    <!-- header area end -->
    <!-- popup search -->
    <div class="search-popup">
      <button class="close-search">
        <span class="far fa-times"></span>
      </button>
      <form action="#">
        <div class="form-group">
          <input
            type="search"
            name="search-field"
            class="form-control"
            placeholder="Search Here..."
            required>
          <button type="submit">
            <i class="far fa-search"></i>
          </button>
        </div>
      </form>
    </div>
    <!-- popup search end -->
    <main class="main">
        @yield('content')
    </main>
    <!-- footer area -->
    <footer class="footer-area">
      <div class="footer-shape">
        <img src="assets/img/shape/01.png" alt>
      </div>
      <div class="footer-widget">
        <div class="container">
          <div class="footer-widget-wrap pt-70 pb-70">
            <div class="row g-4">
              <div class="col-lg-5">
                <div class="footer-widget-box about-us">
                  <h4 class="footer-widget-title">Notre entreprise</h4>
                  <p class="mb-4">
                    Au cœur de notre activité globale, la formation sur l'importance du port des EPI, le choix des EPI et l'entretien des EPI afin de tendre vers le ZERO accident de travail et ainsi booster la performance et la productivité de nos entreprises clients.
                  </p>
                  <div class="footer-newsletter">
                    <h6>S'inscrire à la NewsLetter</h6>
                    <div class="newsletter-form">
                      <form action="#">
                        <div class="form-group">
                          <div class="form-icon">
                            <i class="far fa-envelopes"></i>
                            <input type="email" class="form-control"
                              placeholder="Votre Email">
                            <button class="theme-btn" type="submit">
                              S'inscrire
                              <span class="far fa-paper-plane"></span>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="footer-widget-box list">
                  <h4 class="footer-widget-title">Votre compte</h4>
                  <ul class="footer-list">
                    <li>
                      <a href="#">
                        <i class="far fa-angle-double-right"></i>Informations personnelles
                      </a>
                    </li>
                    <li>
                      <a href="#!">
                        <i class="far fa-angle-double-right"></i>Retours produit
                        
                      </a>
                    </li>
                    <li>
                      <a href="#!">
                        <i class="far fa-angle-double-right"></i>Commandes
                      </a>
                    </li>
                    <li>
                      <a href="#!">
                        <i class="far fa-angle-double-right"></i>Avoirs                        
                      </a>
                    </li>
                    <li>
                      <a href="#!">
                        <i class="far fa-angle-double-right"></i>Adresses
                      </a>
                    </li>
                    <li>
                      <a href="#!">
                        <i class="far fa-angle-double-right"></i>Bons de réduction
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="footer-widget-box">
                  <h4 class="footer-widget-title">Nous contacter</h4>
                  <ul class="footer-contact">
                    <li>
                      <div class="icon">
                        <i class="far fa-location-dot"></i>
                      </div>
                      <div class="content">
                        <h6>Localisation</h6>
                        <p>Yopougon - Abidjan - Côte d'Ivoire</p>
                      </div>
                    </li>
                    <li>
                      <div class="icon">
                        <i class="far fa-phone"></i>
                      </div>
                      <div class="content">
                        <h6>Téléphone</h6>
                        <p>{{ config('phone') }}</p>
                      </div>
                    </li>
                    <li>
                      <div class="icon">
                        <i class="far fa-envelope"></i>
                      </div>
                      <div class="content">
                        <h6>Email</h6>
                        <p>{{ config('email') }}</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="copyright">
          <div class="row">
            <div class="col-md-6 align-self-center">
              <p class="copyright-text">
                &copy; Copyright
                <span id="date"></span>
                <a href="#"> EPI STORE SARL</a>
                All Rights Reserved.
              </p>
            </div>
            <div class="col-md-6 align-self-center">
              <ul class="footer-social">
                <li>
                  <a href="https://web.facebook.com/epistoresarl/" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fab fa-x-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer area end -->
    <!-- scroll-top -->
    <a href="#" id="scroll-top">
      <i class="far fa-arrow-up"></i>
    </a>
    <!-- scroll-top end -->
    <!-- js -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/counter-up.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/contact-form.js?v=2.0.1"></script>
  </body>
</html>    