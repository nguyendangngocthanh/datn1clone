@extends('layouts.master')

@section('main-content')
<!-- inner page section -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="post" action="{{ route('frontend.complete') }}" id="MyForm">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                                here</a> to enter your code</h6>
                        <h6 class="checkout__title">Billing Details</h6>

                        <div class="checkout__input">
                            <p>Họ và tên<span>*</span></p>
                            <input type="text" placeholder="Nhập họ & tên" name="fullname" required />
                        </div>
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="email" placeholder="Nhập email" name="email" required />
                        </div>
                        <div class="checkout__input">
                            <p>Số điện thoại<span>*</span></p>
                            <input type="tel" placeholder="Nhập số điện thoại" name="phone_number" required />
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ nhận hàng<span>*</span></p>
                            <input type="text" placeholder="Nhập địa chỉ nhận hàng" name="address" required />
                        </div>
                        <div class="checkout__input">
                            <p>Lưu ý khi nhận hàng<span>*</span></p>
                            <input type="text" placeholder="Nhập lưu ý của bạn vào đây" name="note">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Đơn hàng của bạn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Đơn giá</span></div>
                            <ul class="checkout__total__products">
                                @php
                                $total = 0;
                                @endphp
                                @foreach($cartItems as $item)
                                @php
                                $total += $item->discount * $item->num;
                                @endphp
                                <li>{{ $item->title }} <span>{{ number_format($item->discount * $item->num, 0) }}</span></li>
                                @endforeach
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Giá trị đơn hàng dự kiến <span>{{ number_format($total, 0) }}</span></li>
                                <li>Tổng <span>{{ number_format($total, 0) }}</span></li>
                                </ul>
                                <p>Đơn hàng sẽ được vận chuyển trong vài ngày, chúng tôi sẽ cố gắng giao hàng sớm nhất có thể, vui lòng kiểm tra điện thoại khi người gửi hàng gọi đến.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Vui lòng xác nhận đơn hàng
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end product section -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("MyForm");
            var checkbox = document.getElementById("acc-or");

            form.addEventListener("submit", function(event) {
                if (!checkbox.checked) {
                    event.preventDefault();
                    alert("Vui lòng xác nhận đơn hàng");
                }
            });
        });
    </script>
    @stop
