@extends('master')

@section('content')
      <!-- breadcrumb -->
      <div class="site-breadcrumb"
        style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
          <h2 class="breadcrumb-title">Shop Checkout</h2>
          <ul class="breadcrumb-menu">
            <li><a href="/">Home</a></li>
            <li class="active">Shop Checkout</li>
          </ul>
        </div>
      </div>
      <!-- breadcrumb end -->

      <!-- shop checkout -->
      <div class="shop-checkout py-120">
        <div class="container">
          <div class="row g-4">
            <div class="col-lg-8">
              <div class="widget">
                <h4 class="title">Billing Address</h4>
                <div class="checkout-form">
                  <form action="#">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">First Name</label>
                          <input type="text" class="form-control"
                            placeholder="Your First Name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Last Name</label>
                          <input type="text" class="form-control"
                            placeholder="Your Last Name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Email</label>
                          <input type="email" class="form-control"
                            placeholder="Your Email">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Phone</label>
                          <input type="text" class="form-control"
                            placeholder="Your Phone">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group mb-0">
                          <label class="form-label">Address</label>
                          <input type="text" class="form-control"
                            placeholder="Your Address">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="widget">
                <h4 class="title">Payment Info</h4>
                <div class="checkout-form">
                  <form action="#">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Card Holder Name</label>
                          <input type="text" class="form-control"
                            placeholder="Name On Card">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Card Number</label>
                          <input type="text" class="form-control"
                            placeholder="Your Card Number">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mb-0">
                          <label class="form-label">Expire Date</label>
                          <input type="text" class="form-control"
                            placeholder="Expire">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mb-0">
                          <label class="form-label">CCV</label>
                          <input type="text" class="form-control"
                            placeholder="CVV">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="widget mb-0">
                <h4 class="title">Shipping Address</h4>
                <div class="checkout-form">
                  <form action="#">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">First Name</label>
                          <input type="text" class="form-control"
                            placeholder="Your First Name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Last Name</label>
                          <input type="text" class="form-control"
                            placeholder="Your Last Name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Email</label>
                          <input type="email" class="form-control"
                            placeholder="Your Email">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Phone</label>
                          <input type="text" class="form-control"
                            placeholder="Your Phone">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Address 1</label>
                          <input type="text" class="form-control"
                            placeholder="Your Address">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Address 2</label>
                          <input type="text" class="form-control"
                            placeholder="Your Address">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group mb-0">
                          <label class="form-label">Additional Info</label>
                          <textarea class="form-control" cols="30" rows="5"
                            placeholder="Additional Info"></textarea>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="shop-cart">
                <div class="cart-summary">
                  <h4 class="mb-30">Cart Summary</h4>
                  <ul>
                    <li><strong>Product Qty:</strong> <span>5</span></li>
                    <li><strong>Shipping Cost:</strong> <span>$25.00</span></li>
                    <li><strong>Discount:</strong> <span>$5.00</span></li>
                    <li><strong>Vat:</strong> <span>$20.00</span></li>
                    <li><strong>Sub Total:</strong> <span>$4,540.00</span></li>
                    <li class="cart-total"><strong>Total Pay:</strong>
                      <span>$4,540.00</span></li>
                  </ul>
                  <div class="text-end mt-40">
                    <a href="#" class="theme-btn">Confirm Payment<i
                        class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- shop checkout end -->
@endsection