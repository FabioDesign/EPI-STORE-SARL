@extends('master')

@section('content')

      <!-- breadcrumb -->
      <div class="site-breadcrumb"
        style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
          <h2 class="breadcrumb-title">Shop Single</h2>
          <ul class="breadcrumb-menu">
            <li><a href="/">Home</a></li>
            <li class="active">Shop Single</li>
          </ul>
        </div>
      </div>
      <!-- breadcrumb end -->

      <!-- shop single -->
      <div class="shop-single bg py-120">
        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <div class="shop-single-gallery mb-5">
                <div class="flexslider-thumbnails">
                  <ul class="slides">
                    <li data-thumb="assets/img/shops/01.png"
                      rel="adjustX:10, adjustY:">
                      <img src="assets/img/shops/01.png" alt="#">
                    </li>
                    <li data-thumb="assets/img/shops/02.png">
                      <img src="assets/img/shops/02.png" alt="#">
                    </li>
                    <li data-thumb="assets/img/shops/03.png">
                      <img src="assets/img/shops/03.png" alt="#">
                    </li>
                    <li data-thumb="assets/img/shops/04.png">
                      <img src="assets/img/shops/04.png" alt="#">
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="shop-single-info">
                <h4 class="title">Solar Panels Energy</h4>
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                  <i class="far fa-star"></i>
                  <span class="rating-count"> (4 Customer Reviews)</span>
                </div>
                <div class="price">
                  <h4><del>$690</del><span>$650</span></h4>
                </div>
                <p class="mb-4">
                  There are many variations of passages of Lorem Ipsum
                  available, but the majority have
                  suffered alteration in some form, by injected humour, or
                  randomised words which don't
                  look even slightly believable.
                </p>
                <div class="content">
                  <h5>Stock: <span>Available</span></h5>
                  <h5>SKU: <span>652TEWB</span></h5>
                </div>
                <div class="action-wrap">
                  <h5>Quantity:</h5>
                  <div class="cart-qty">
                    <button class="minus-btn"><i
                        class="fal fa-minus"></i></button>
                    <input class="quantity" type="text" value="1" disabled>
                    <button class="plus-btn"><i
                        class="fal fa-plus"></i></button>
                  </div>
                  <div class="action-btns">
                    <button class="theme-btn"><span
                        class="far fa-shopping-cart"></span>Add cart</button>
                    <a href="#" class="action-btn"><i
                        class="far fa-heart"></i></a>
                    <a href="#" class="action-btn"><i
                        class="far fa-exchange-alt"></i></a>
                  </div>
                </div>
                <div class="content">
                  <h5>Category: <span>Solar Panels</span></h5>
                  <h5>Tags: <span>Solar, Shop, Energy</span></h5>
                </div>
                <hr>
                <div class="share">
                  <span>Share:</span>
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-x-twitter"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="shop-single-details">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-tab1"
                  data-bs-toggle="tab" data-bs-target="#tab1"
                  type="button" role="tab" aria-controls="tab1"
                  aria-selected="true">Description</button>
                <button class="nav-link" id="nav-tab2" data-bs-toggle="tab"
                  data-bs-target="#tab2"
                  type="button" role="tab" aria-controls="tab2"
                  aria-selected="false">Additional
                  Info</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <!-- tab 1 -->
              <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                aria-labelledby="nav-tab1">

                <div class="shop-single-desc">
                  <p>
                    There are many variations of passages of Lorem Ipsum
                    available, but the majority
                    have suffered alteration in some form, by injected humour,
                    or randomised words which
                    don't look even slightly believable. If you are going to use
                    a passage of Lorem
                    Ipsum, you need to be sure there isn't anything embarrassing
                    hidden in the middle of
                    text. All the Lorem Ipsum generators on the Internet tend to
                    repeat predefined
                    chunks as necessary, making this the first true generator on
                    the Internet.
                  </p>
                  <p>
                    Sed ut perspiciatis unde omnis iste natus error sit
                    voluptatem accusantium
                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                    illo inventore
                    veritatis et quasi architecto beatae vitae dicta sunt
                    explicabo. Nemo enim ipsam
                    voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                    sed quia consequuntur
                    magni dolores eos qui ratione voluptatem sequi nesciunt.
                    Neque porro quisquam est,
                    qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                    velit.
                  </p>
                </div>
              </div>
              <!-- tab 2 -->
              <div class="tab-pane fade" id="tab2" role="tabpanel"
                aria-labelledby="nav-tab2">
                <div class="shop-single-more-info">
                  <p>
                    There are many variations of passages of Lorem Ipsum
                    available, but the majority
                    have suffered alteration in some form, by injected humour,
                    or randomised words which
                    don't look even slightly believable. If you are going to use
                    a passage of Lorem
                    Ipsum, you need to be sure there isn't anything embarrassing
                    hidden in the middle of
                    text. All the Lorem Ipsum generators on the Internet tend to
                    repeat predefined
                    chunks as necessary, making this the first true generator on
                    the Internet.
                  </p>
                  <p>
                    Sed ut perspiciatis unde omnis iste natus error sit
                    voluptatem accusantium
                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                    illo inventore
                    veritatis et quasi architecto beatae vitae dicta sunt
                    explicabo. Nemo enim ipsam
                    voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                    sed quia consequuntur
                    magni dolores eos qui ratione voluptatem sequi nesciunt.
                    Neque porro quisquam est,
                    qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                    velit.
                  </p>
                </div>
              </div>

            </div>
          </div>
          <div class="related-item">
            <div class="row">
              <div class="col-12 mx-auto">
                <div class="site-heading">
                  <h2 class="site-title">Produits complémentaires</h2>
                </div>
              </div>
            </div>
            <div class="shop-item-wrapper">
              <div class="row g-4 align-items-center">
                <div class="col-md-6 col-lg-3">
                  <div class="shop-item">
                    <div class="shop-item-img">
                      <span class="shop-item-sale">Sale</span>
                      <img src="assets/img/shops/01.png" alt>
                      <div class="shop-item-meta">
                        <a href="#"><i class="far fa-heart"></i></a>
                        <a href="#"><i class="far fa-eye"></i></a>
                        <a href="#"><i class="far fa-shopping-cart"></i></a>
                      </div>
                    </div>
                    <div class="shop-item-info">
                      <div class="shop-item-rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      <a href="#">
                        <h4 class="shop-item-title">Solar Panels Energy</h4>
                      </a>
                      <div class="shop-item-price"><del>$560</del> $510</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3">
                  <div class="shop-item">
                    <div class="shop-item-img">
                      <img src="assets/img/shops/03.png" alt>
                      <div class="shop-item-meta">
                        <a href="#"><i class="far fa-heart"></i></a>
                        <a href="#"><i class="far fa-eye"></i></a>
                        <a href="#"><i class="far fa-shopping-cart"></i></a>
                      </div>
                    </div>
                    <div class="shop-item-info">
                      <div class="shop-item-rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      <a href="#">
                        <h4 class="shop-item-title">Solar Panels Energy</h4>
                      </a>
                      <div class="shop-item-price">$680</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3">
                  <div class="shop-item">
                    <div class="shop-item-img">
                      <img src="assets/img/shops/04.png" alt>
                      <div class="shop-item-meta">
                        <a href="#"><i class="far fa-heart"></i></a>
                        <a href="#"><i class="far fa-eye"></i></a>
                        <a href="#"><i class="far fa-shopping-cart"></i></a>
                      </div>
                    </div>
                    <div class="shop-item-info">
                      <div class="shop-item-rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      <a href="#">
                        <h4 class="shop-item-title">Solar Panels Energy</h4>
                      </a>
                      <div class="shop-item-price">$710</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3">
                  <div class="shop-item">
                    <div class="shop-item-img">
                      <span class="shop-item-sale">Sale</span>
                      <img src="assets/img/shops/02.png" alt>
                      <div class="shop-item-meta">
                        <a href="#"><i class="far fa-heart"></i></a>
                        <a href="#"><i class="far fa-eye"></i></a>
                        <a href="#"><i class="far fa-shopping-cart"></i></a>
                      </div>
                    </div>
                    <div class="shop-item-info">
                      <div class="shop-item-rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      <a href="#">
                        <h4 class="shop-item-title">Solar Panels Energy</h4>
                      </a>
                      <div class="shop-item-price"><del>$920</del> $900</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- shop single end -->
@endsection