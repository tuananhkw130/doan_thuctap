@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="{{ asset('client/assets/img/breadcrumb-bg.jpg') }}">
        <div class="container" style="padding-top: 120px;">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Danh sách bài viết</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="pic">
                                <div class="blog__item__pic set-bg">
                                    <a href="{{ route('post.detail', ['id' => $post->id]) }}">
                                        <img src="{{ $post->image }}" alt="{{ $post->title }}">
                                    </a>
                                </div>
                            </div>
                            <div class="blog__item__text">
                                <span>
                                    <img src="{{ asset('client/assets/img/icon/calendar.png') }}" alt=""
                                        type="date">{{ $post->created_at->format('H:i:s d/m/Y') }}
                                </span>
                                <h5>{{ $post->title }}</h5>
                                <a href="{{ route('post.detail', ['id' => $post->id]) }}">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="container pb-4">
        <h2 class="section-title position-relative text-uppercase mx-xl-2 mb-4">
            Có thể bạn chưa biết
        </h2>
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center align-items-center" style="padding: 20px;">
                <iframe width="550" height="425" src="https://www.youtube.com/embed/1Qq3I5bMYPU"
                    title="4 cách cơ bản giúp bạn tìm ra PHONG CÁCH CÁ NHÂN của mình | Việt Nâu" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="col-md-4 d-flex justify-content-center align-items-center" style="padding: 20px;">
                <iframe width="550" height="425" src="https://www.youtube.com/embed/mDpmetYZzkA"
                    title="5 mẹo mặc đẹp mà không tốn kém, không cần nhiều đồ cho nam giới | Việt Nâu" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="col-md-4 d-flex justify-content-center align-items-center" style="padding: 20px;">
                <iframe width="550" height="425" src="https://www.youtube.com/embed/d6VRJJSJ77I"
                    title="Thu này mặc gì? Hướng dẫn phối đồ đơn giản hiệu quả thu 2024" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

        </div>

    </div>
@endsection
