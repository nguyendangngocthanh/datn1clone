@extends('layouts.master')

@section('main-content')
<!-- inner page section -->
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-blog set-bg" data-setbg="../themes/frontend1/img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Our Blog</h2>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            @foreach ($newsList as $item)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{ $item->thumbnail }}"style="background-image: url(&quot;{{ $item->thumbnail }};);"></div>
                    <div class="blog__item__text">
                        <span><img src="../themes/frontend1/img/icon/calendar.png" alt="">{{ getTimeFormat($item->updated_at) }}</span>
                        <h5>
                            {{ $item->title }}
                        </h5>
                        <a href="{{ route('frontend.post', ['id'=>$item->id, 'href_param'=>$item->href_param]) }}">Đọc chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <nav>
            <ul class="pagination justify-content-center" style="min-width: 400px;">
                @if ($newsList->currentPage() > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $newsList->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif

                @for ($i = 1; $i <= $newsList->lastPage(); $i++)
                    <li class="page-item{{ ($newsList->currentPage() === $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $newsList->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($newsList->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $newsList->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>



    </div>
</section>
<!-- Blog Section End -->
<!-- end product section -->
@stop
