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
  <div class="shop-cart py-100">
    <div class="container">
      <div class="contact-form-wrap">
        <form id="shopcart-form">
          <div class="row g-4">
            <div class="col-lg-12">
              <div class="contact-form">
                <div class="contact-form-header">
                  <h2>Vos coordonnées</h2>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="form-icon">
                        <i class="far fa-user-tie"></i>
                        <input type="text" name="username" value="{{ $username }}" class="form-control username" maxlength="50" placeholder="Nom Complet">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="form-icon">
                        <i class="far fa-phone"></i>
                        <input type="text" name="number" value="{{ $number }}" class="form-control number" maxlength="10" placeholder="Numéro de téléphone" onKeyUp="verif_num(this)">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="form-icon">
                        <i class="far fa-envelope"></i>
                        <input type="text" name="email" value="{{ $email }}" class="form-control email" maxlength="50" placeholder="Email">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 offset-lg-3">
                <div class="form-message text-center"></div>
            </div>
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th><h5>Images</h5></th>
                      <th><h5>Types</h5></th>
                      <th><h5>Articles</h5></th>
                      <th style="width: 160px;text-align: center;"><h5>Quantité</h5></th>
                      <th style="width: 100px;text-align: center;"><h5>Supprimé</h5></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($query as $data)
                      <tr>
                        <td>
                          <div class="cart-img">
                            <img src="assets/img/shops/{{ $data['code'] }}/{{ $data['filename'] }}" alt="{{ $data['submenu'] }}">
                          </div>
                        </td>
                        <td><h5>{{ $data['menu'] }}</h5></td>
                        <td>{{ $data['submenu'] }}</td>
                        <td>
                          <div class="cart-qty">
                            <button class="minus-btn"><i class="fal fa-minus"></i></button>
                            <input type="text" name="quantity[{{ $data['id'] }}]" value="1" class="quantity" readonly>
                            <button class="plus-btn"><i class="fal fa-plus"></i></button>
                          </div>
                        </td>
                        <td class="text-center">
                          <div class="cart-qty">
                            <button class="cart-remove" data-id="{{ $data['id'] }}" data-img="{{ $data['img'] }}"><i class="fal fa-times text-danger"></i></button>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              @if (!empty($query))
              <div class="text-right">
                <button type="submit" class="theme-btn submit-cmd">Valider la commande <i class="far fa-paper-plane"></i></button>
              </div>
              @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection