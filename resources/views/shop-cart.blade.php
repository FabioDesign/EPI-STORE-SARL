@extends('master')

@section('content')
      <div class="site-breadcrumb"
        style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
          <h2 class="breadcrumb-title">Panier</h2>
          <ul class="breadcrumb-menu">
            <li><a href="/">Accueil</a></li>
            <li class="active">Panier</li>
          </ul>
        </div>
      </div>

      <div class="shop-cart py-120">
        <div class="container">
          <div class="row shop-cart-wrapper">
            <div class="col-lg-8">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Sub Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="cart-img">
                          <img src="assets/img/shop/01.png" alt>
                        </div>
                      </td>
                      <td>
                        <h5>Solar Panels Energy</h5>
                      </td>
                      <td>
                        <div class="cart-price">
                          <span>$1,500</span>
                        </div>
                      </td>
                      <td>
                        <div class="cart-qty">
                          <button class="minus-btn"><i
                              class="fal fa-minus"></i></button>
                          <input class="quantity" type="text" value="1" disabled>
                          <button class="plus-btn"><i
                              class="fal fa-plus"></i></button>
                        </div>
                      </td>
                      <td>
                        <div class="cart-sub-total">
                          <span>$1,500</span>
                        </div>
                      </td>
                      <td>
                        <a href="#" class="cart-remove"><i
                            class="far fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="cart-img">
                          <img src="assets/img/shop/02.png" alt>
                        </div>
                      </td>
                      <td>
                        <h5>Solar Panels Energy</h5>
                      </td>
                      <td>
                        <div class="cart-price">
                          <span>$1,500</span>
                        </div>
                      </td>
                      <td>
                        <div class="cart-qty">
                          <button class="minus-btn"><i
                              class="fal fa-minus"></i></button>
                          <input class="quantity" type="text" value="1" disabled>
                          <button class="plus-btn"><i
                              class="fal fa-plus"></i></button>
                        </div>
                      </td>
                      <td>
                        <div class="cart-sub-total">
                          <span>$1,500</span>
                        </div>
                      </td>
                      <td>
                        <a href="#" class="cart-remove"><i
                            class="far fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="cart-img">
                          <img src="assets/img/shop/03.png" alt>
                        </div>
                      </td>
                      <td>
                        <h5>Solar Panels Energy</h5>
                      </td>
                      <td>
                        <div class="cart-price">
                          <span>$1,500</span>
                        </div>
                      </td>
                      <td>
                        <div class="cart-qty">
                          <button class="minus-btn"><i
                              class="fal fa-minus"></i></button>
                          <input class="quantity" type="text" value="1" disabled>
                          <button class="plus-btn"><i
                              class="fal fa-plus"></i></button>
                        </div>
                      </td>
                      <td>
                        <div class="cart-sub-total">
                          <span>$1,500</span>
                        </div>
                      </td>
                      <td>
                        <a href="#" class="cart-remove"><i
                            class="far fa-times"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="cart-coupon">
                <div class="form-group">
                  <input type="text" class="form-control"
                    placeholder="Votre Code Coupon">
                  <button class="theme-btn" type="submit">Appliquer<i
                      class="fas fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="cart-summary">
                <ul>
                  <li><strong>Sous Total:</strong>
                    <span>$4,500.00</span></li>
                  <li><strong>TVA:</strong> <span>$25.00</span></li>
                  <li><strong>Réduction:</strong> <span>$5.00</span></li>
                  <li class="cart-total"><strong>Total:</strong>
                    <span>$4,520.00</span></li>
                </ul>
                <div class="text-end mt-40">
                  <a href="shop-checkout.html" class="theme-btn">Checkout Now<i
                      class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
            
            <div class="cart-footer">
              <div class="row">
                <div class="col-md-6 col-lg-4">
                  
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection