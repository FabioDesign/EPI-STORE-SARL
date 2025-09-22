@extends('master')

@section('content')

      <!-- breadcrumb -->
      <div class="site-breadcrumb"
        style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
          <h2 class="breadcrumb-title">Register</h2>
          <ul class="breadcrumb-menu">
            <li><a href="index.html">Home</a></li>
            <li class="active">Register</li>
          </ul>
        </div>
      </div>
      <!-- breadcrumb end -->

      <!-- register area -->
      <div class="auth-area py-120">
        <div class="container">
          <div class="col-md-5 mx-auto">
            <div class="auth-form">
              <div class="auth-header">
                <img src="assets/img/logo.png" alt>
                <p>Create your free solario account</p>
              </div>
              <form action="#">
                <div class="form-group">
                  <div class="form-icon">
                    <i class="far fa-user-tie"></i>
                    <input type="text" class="form-control"
                      placeholder="Your Name">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-icon">
                    <i class="far fa-envelope"></i>
                    <input type="email" class="form-control"
                      placeholder="Your Email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-icon">
                    <i class="far fa-key"></i>
                    <input type="password" id="password" class="form-control"
                      placeholder="Your Password">
                    <span class="password-view"><i
                        class="far fa-eye-slash"></i></span>
                  </div>
                </div>
                <div class="auth-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value
                      id="agree">
                    <label class="form-check-label" for="agree">
                      I agree with the <a href="terms.html"
                        class="auth-group-link">Terms Of Service.</a>
                    </label>
                  </div>
                </div>
                <div class="auth-btn">
                  <button type="submit" class="theme-btn"><span
                      class="far fa-paper-plane"></span> Register</button>
                </div>
              </form>
              <div class="auth-bottom">
                <p class="auth-bottom-text">Vous avez déjà un compte? <a
                    href="/login">Login.</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- register area end -->

@endsection