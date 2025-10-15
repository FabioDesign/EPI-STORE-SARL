@extends('master')

@section('content')
  <!-- breadcrumb -->
  <div class="site-breadcrumb"
    style="background: url(assets/img/breadcrumb.jpg)">
    <div class="container">
      <h2 class="breadcrumb-title">{{ $titre }}</h2>
      <ul class="breadcrumb-menu">
        <li><a href="/">Accueil</a></li>
        <li class="active">{{ $label }}</li>
      </ul>
    </div>
  </div>
  <!-- breadcrumb end -->
  @foreach($shops as $shop)
  <!-- shop-area -->
  <div class="shop-area bg py-120" id="{{ $shop['code'] }}">
    <div class="container-fluid">
      <div class="row g-4">
        <div class="col-lg-12">
          <div class="col-md-12">
            <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInDown;">
              <h2 class="site-title">{{ $label }} - <span>{{ $shop['libelle'] }}</span></h2>
              <div class="heading-divider"></div>
            </div>
          </div>
          
          <div class="shop-item-wrap">
            <div class="row g-4 align-items-center">
              @foreach($shop['imgshops'] as $imgshop)
              <div class="col-md-6 col-lg-2">
                <div class="shop-item">
                  <div class="shop-item-img">
                    <img src="assets/img/shops/{{ $shop['code'] }}/{{ $imgshop['filename'] }}" alt>
                    <div class="shop-item-meta">
                      <a href="#"><i class="far fa-heart"></i></a>
                      <a href="#"><i class="far fa-eye"></i></a>
                      <a href="#"><i class="far fa-shopping-cart"></i></a>
                    </div>
                  </div>
                  <div class="shop-item-info">
                    <a href="#" class="shopcart" data-id="{{ $imgshop['id'] }}">
                      <h4 class="shop-item-title">Ajouter au panier</h4>
                    </a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          @if($shop['pagination']['lastPage'] > 1)
          <div class="pagination-area mt-4">
            <div aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <?php $num = $shop['pagination']['currentPage'] > 1 ? ($shop['pagination']['currentPage'] - 1):1; ?>
                  <a class="page-link" href="/shops?code={{ $shop['code'] . "&num=" . $num . "#" . $shop['code'] }}" aria-label="Previous">
                    <span aria-hidden="true"><i
                        class="fas fa-arrow-left"></i></span>
                  </a>
                </li>
                @for($i = 1; $i <= $shop['pagination']['lastPage']; $i++)
                <?php $active = $shop['pagination']['currentPage'] == $i ? "active":""; ?>
                <li class="page-item {{ $active }}"><a class="page-link" href="/shops?code={{ $shop['code'] . "&num=" . $i . "#" . $shop['code'] }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item">
                  <?php $num = $shop['pagination']['currentPage'] < $shop['pagination']['lastPage'] ? ($shop['pagination']['currentPage'] + 1):$shop['pagination']['lastPage']; ?>
                  <a class="page-link" href="/shops?code={{ $shop['code'] . "&num=" . $num . "#" . $shop['code'] }}" aria-label="Next">
                    <span aria-hidden="true"><i
                        class="fas fa-arrow-right"></i></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- shop-area end -->
@endsection