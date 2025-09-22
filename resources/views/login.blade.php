@extends('master')

@section('content')

      <!-- breadcrumb -->
      <div class="site-breadcrumb"
        style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
          <h2 class="breadcrumb-title">Login</h2>
          <ul class="breadcrumb-menu">
            <li><a href="/">Home</a></li>
            <li class="active">Login</li>
          </ul>
        </div>
      </div>
      <!-- breadcrumb end -->

      <!-- login area -->
      <div class="auth-area py-120">
        <div class="container">
          <div class="col-md-5 mx-auto">
            <div class="auth-form">
              <div class="auth-header">
                <img src="assets/img/logo.png" alt>
                <p>Login with your solario account</p>
              </div>
              <form action="#">
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
                      id="remember">
                    <label class="form-check-label" for="remember">
                      Remember Me
                    </label>
                  </div>
                  <a href="/forgot-password" class="auth-group-link">Forgot
                    Password?</a>
                </div>
                <div class="auth-btn">
                  <button type="submit" class="theme-btn"><span
                      class="far fa-sign-in"></span> Login</button>
                </div>
              </form>
              <div class="auth-bottom">
                <p class="auth-bottom-text">Vous n'avez pas de compte? <a
                    href="/register">Register.</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- login area end -->
@endsection