@extends('master')

@section('content')

      <!-- breadcrumb -->
      <div class="site-breadcrumb"
        style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
          <h2 class="breadcrumb-title">Forgot Password</h2>
          <ul class="breadcrumb-menu">
            <li><a href="/">Home</a></li>
            <li class="active">Forgot Password</li>
          </ul>
        </div>
      </div>
      <!-- breadcrumb end -->

      <!-- forgot password area -->
      <div class="auth-area py-120">
        <div class="container">
          <div class="col-md-5 mx-auto">
            <div class="auth-form">
              <div class="auth-header">
                <img src="assets/img/logo.png" alt>
                <p>Mot de passe oublié</p>
              </div>
              <form action="#">
                <div class="form-group">
                  <div class="form-icon">
                    <i class="far fa-envelope"></i>
                    <input type="email" class="form-control"
                      placeholder="Your Email">
                  </div>
                </div>
                <div class="auth-btn">
                  <button type="submit" class="theme-btn"><span
                      class="far fa-key"></span> Envoyer le lien</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- forgot password area end -->
@endsection