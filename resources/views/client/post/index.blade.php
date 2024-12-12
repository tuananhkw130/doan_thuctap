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
    <!-- Blog Section End -->
@endsection
