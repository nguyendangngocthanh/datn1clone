@extends('layouts.master')

@section('main-content')
<!-- inner page section -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d941.4128667895917!2d106.6362916786003!3d17.32031111398855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3140aca3a504b8c7%3A0x50fcfa4185bf9381!2zWHXDom4gROG7pWMsIFh1w6JuIE5pbmgsIFF14bqjbmcgTmluaCwgUXXhuqNuZyBCw6xuaCwgVmnhu4d0IE5hbQ!5e1!3m2!1svi!2s!4v1684087210558!5m2!1svi!2s"  height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!-- Map End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__text">
                    <div class="section-title">
                        <span>Thông tin</span>
                        <h2>Liên hệ chúng tôi</h2>
                        <p>Hãy để chúng tôi lắng nghe các bạn, để tất cả mọi trải nghiệm sau này tốt hơn</p>
                    </div>
                    <ul>
                        <li>
                            <h4>Quảng Bình</h4>
                            <p>Xóm 2, thôn Xuân Dục 1, xã Xuân Ninh, huyện Quảng Ninh, tỉnh Quảng Bình</p>
                        </li>
                        <li>
                            <h4>Chi nhánh duy nhất ở Quảng Bình</h4>
                            <p>Liên hệ chúng tôi qua số điện thoại <br />+84 7634 32905</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    <form action="{{ route('frontend.contact.send') }}" method="post">
                       <fieldset>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Họ và tên" name="fullname" required />
                            </div>
                            <div class="col-lg-6">
                                <input type="email" placeholder="Email" name="email" required />
                            </div>
                            <div class="col-lg-6">
                                <input type="tel"  placeholder="Số điện thoại" name="phone_number" required />
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Chủ đề" name="subject_name" required />
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Nội dung" required name="note"></textarea>
                                <button type="submit" class="site-btn">Gửi thông tin</button>
                            </div>
                        </div>
                       </fieldset>


                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
