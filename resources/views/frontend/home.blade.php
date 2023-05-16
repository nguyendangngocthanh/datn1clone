@extends('layouts.master')

@section('slider')
  <!-- Hero Section Begin -->
  <section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="../themes/frontend1/img/hero/hero-3.jpg" style="background-image: url(&quot;../themes/frontend1/img/hero/hero-1.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Sản phẩm hot nhất năm</h6>
                            <h2>Uy tín tạo nên chất lượng</h2>
                            <p>Chúng tôi, với những con người luôn tận tình hỗ trợ và giúp đỡ bạn</p>
                            <a href="{{ route('frontend.products') }}" class="primary-btn">Mua sắm ngay<span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <<div class="hero__items set-bg" data-setbg="../themes/frontend1/img/hero/hero-4.jpg" style="background-image: url(&quot;../themes/frontend1/img/hero/hero-2.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Sản phẩm hot nhất năm</h6>
                            <h2>Uy tín tạo nên chất lượng</h2>
                            <p>Chúng tôi, với những con người luôn tận tình hỗ trợ và giúp đỡ bạn</p>
                            <a href="#" class="primary-btn">Mua sắm ngay<span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
@stop


@section('main-content')
    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic" style="width: 480px; height: 480px; overflow: hidden;">
                            <img src="https://static.pxlecdn.com/photos/421257690/medium/fae692331520517aa5f2.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>

                        <div class="banner__item__text">
                            <h2>Sản phẩm nổi bật</h2>
                            <a href="#">Mua sắm ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic" style="width: 480px; height: 480px; overflow: hidden;">
                            <img src="https://static.pxlecdn.com/photos/438414880/medium/784b4299bced08cb91b3.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="banner__item__text">
                            <h2>Nhiều sự lựa chọn dành cho bạn</h2>
                            <a href="#">Mua sắm ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic" style="width: 480px; height: 480px; overflow: hidden;">
                            <img src="https://static.pxlecdn.com/photos/423579498/medium/221a6539edd9e9755044.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="banner__item__text">
                            <h2>Mẫu mã đẹp mắt</h2>
                            <a href="#">Mua sắm ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li data-filter=".hot-sales">Sản phẩm mới nhất của chúng tôi</li>
                    </ul>
                </div>
            </div>
            <div class="row">

                @foreach ($productList as $item)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ $item->thumbnail }}" style="background-image: url(&quot;{{ $item->thumbnail }};);">
                            <ul class="product__hover">
                                <li><a href="#"><img src="../themes/frontend1/img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="../themes/frontend1/img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="{{ route('frontend.detail',['id'=>$item->id, 'href_param'=>$item->slug]) }}"><img src="../themes/frontend1/img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $item->title }}</h6>
                            <a href="{{ route('frontend.detail',['id'=>$item->id,'href_param'=>$item->slug]) }}" class="add-cart">+ Thêm giỏ hàng</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>{{ number_format($item->discount, 0)}} VNĐ</h5>
                            <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active black" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="grey" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="../themes/frontend1/img/product-sale.png" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>$29.99</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>Multi-pocket Chest Bag Black</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Mua sắm ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="../themes/frontend1/img/instagram/instagram-1.jpg" style="background-image: url(&quot;../themes/frontend1/img/instagram/instagram-1.jpg&quot;);"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="../themes/frontend1/img/instagram/instagram-2.jpg" style="background-image: url(&quot;../themes/frontend1/img/instagram/instagram-2.jpg&quot;);"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="../themes/frontend1/img/instagram/instagram-3.jpg" style="background-image: url(&quot;../themes/frontend1/img/instagram/instagram-3.jpg&quot;);"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="../themes/frontend1/img/instagram/instagram-4.jpg" style="background-image: url(&quot;../themes/frontend1/img/instagram/instagram-4.jpg&quot;);"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="../themes/frontend1/img/instagram/instagram-5.jpg" style="background-image: url(&quot;../themes/frontend1/img/instagram/instagram-5.jpg&quot;);"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="../themes/frontend1/img/instagram/instagram-6.jpg" style="background-image: url(&quot;../themes/frontend1/img/instagram/instagram-6.jpg&quot;);"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                        <h3>#Male_Fashion</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <!-- Instagram Section End -->


@stop
