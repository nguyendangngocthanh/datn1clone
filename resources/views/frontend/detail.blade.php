@extends('layouts.master')

@section('main-content')
<!-- inner page section -->
<section class="inner_page_head">
 <div class="container_fuild">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="./index.html">Trang chủ</a>
                        <a href="./shop.html">Cửa hàng</a>
                        <span>Product Details</span>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="product__details__text">
                        <h4>{{ $detail->title }}</h4>
                    </div>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <span> - Hàng chất lượng</span>
                    </div>
                   </div>
            </div>

        </div>
    </div>
  </div>
</section>
<!-- end inner page section -->
<!-- product section -->
<section class="product_section layout_padding">
 <div class="container">
    <div class="row">
      <div class="col-md-5">
         <img src="{{ $detail->thumbnail }}" style="min-width: 100%; max-width: 100%;">
      </div>
      <div class="col-md-7">
        <h3 class="fw-bold">Sản Phẩm: {{ $detail->title }}</h3>
        <div class="d-flex align-items-center">
            <p class="h1 text-danger me-3 mb-0">{{ number_format($detail->discount) }} vnđ</p>
            <p class="h5 text-muted mb-0"><del>Giá Cũ: {{ number_format($detail->price) }} vnđ</del></p>
        </div>
        <h3 class="mt-4">Mô Tả Sản Phẩm</h3>
        {!! $detail->description !!}
        <div class="d-flex mt-4">
            <div class="col-2">
              <input type="number" name="num" class="form-control" style="font-size: 16px; text-align: center;" value="1">
            </div>
            <div class="col-10 col-md-auto">
              <button class="btn btn-success btn-dark" style="font-size: 20px;" onclick="addCart({{ $detail->id }}, $('[name=num]').val())">Thêm vào giỏ hàng</button>
            </div>
          </div>

    </div>



      <div class="col-lg-12">
        <h3 class="related-title">Sản phẩm liên quan</h3>
    </div>
    	@foreach($productList as $item)
       {{-- <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
             <div class="option_container">
                <div class="options">
                   <a href="{{ route('frontend.detail', ['id'=>$item->id, 'href_param'=>$item->slug]) }}" class="option1">
                   {{ $item->title }}
                   </a>
                   <a href="{{ route('frontend.detail', ['id'=>$item->id, 'href_param'=>$item->slug]) }}" class="option2">
                     Thêm Giỏ Hàng
                   </a>
                </div>
             </div>
             <div class="img-box">
                <img src="{{ $item->thumbnail }}" alt="{{ $item->title }}">
             </div>
             <div class="detail-box">
                <h5>
                   {{ $item->title }}
                </h5>
                <h6>
                   {{ number_format($item->discount, 0) }} vnd
                </h6>
             </div>
          </div>
       </div> --}}

       <div class="col-lg-4 col-md-6 col-sm-6">
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
<!-- end product section -->
@stop

@section('js')
<script type="text/javascript">
    function addCart(id, num) {
       cartList = getCookie('cart')
       if(cartList != null && cartList != '') {
          cartList = JSON.parse(cartList)
       } else {
          cartList = []
       }

       isFind = false
       for (var i = 0; i < cartList.length; i++) {
          if(cartList[i].id == id) {
             cartList[i].num = parseInt(cartList[i].num) + parseInt(num)
             isFind = true
             break
          }
       }

       if(!isFind) {
          cartList.push({
             'id': id,
             'num': num
          })
       }

       cartList = JSON.stringify(cartList)
       document.cookie = `cart=${cartList}` + getLifecycle()

       location.reload()
    }


    function getLifecycle() {
     var now = new Date();
     var time = now.getTime();
     var expireTime = time + 30*1000*86400;
     now.setTime(expireTime);
     return ';expires='+now.toUTCString()+';path=/';
   }

    function getCookie(name) {
        function escape(s) { return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1'); }
        var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
        return match ? match[1] : null;
    }
 </script>
@stop
