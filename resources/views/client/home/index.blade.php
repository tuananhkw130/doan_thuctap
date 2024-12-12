@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero__slider owl-carousel owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(-2698px, 0px, 0px); transition: all 0s ease 0s; width: 8094px;">
                    <div class="owl-item active" style="width: 1349px; height: 388px">
                        <div class="hero__items set-bg1" data-setbg="{{ asset('client/assets/img/hero/hero8.jpg') }}"
                            style="background-image: url({{ asset('client/assets/img/hero/hero8.jpg') }});">

                        </div>
                    </div>
                    <div class="owl-item" style="width: 1349px; height: 388px">
                        <div class="hero__items set-bg1" data-setbg="{{ asset('client/assets/img/hero/hero14.jpg') }}"
                            style="background-image: url(&quot;{{ asset('client/assets/img/hero/hero14.jpg') }}&quot;);">
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-dots disabled"></div>
        </div>
    </section>

    <x-ProductNewComponent />

    <div class="container mb-5">
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('client/assets/img/qc1.webp') }}" alt="">
            </div>
            <div class="col-4">
                <img src="{{ asset('client/assets/img/qc2.webp') }}" alt="">
            </div>
            <div class="col-4">
                <img src="{{ asset('client/assets/img/qc3.webp') }}" alt="">
            </div>
        </div>
    </div>

    <div class="container pb-5 position-relative ">
        <div class="winter chuong">
            <div class="banner_pic">
                <img src="{{ asset('client/assets/img/bannerthudong.webp') }}" alt="">
            </div>
            <x-product-winter-component />
        </div>
    </div>
    <section class="banner spad pt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{ asset('client/assets/img/banner/banner-1.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Bộ sưu tập mùa Giáng sinh 2024</h2>
                            <a href="#">Xem ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 noelhome">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{ asset('client/assets/img/banner/banner-2.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Phụ kiện</h2>
                            <a href="#">Xem ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img style="width:580px" src="{{ asset('client/assets/img/dmthethao.webp') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Bộ sư tập <br> Thể thao</h2>
                            <a href="{{ route('products.filterByCategory', ['idcategory' => 8]) }}">Xem ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-5  position-relative ">
        <div class="summer chuong">
            <div class="banner_pic">
                <img src="{{ asset('client/assets/img/bannerhe.webp') }}" alt="">
            </div>
            <x-product-summer-component />
        </div>
    </div>

    <div class="container pb-5">
        <div class="banner_pic">
            <img src="{{ asset('client/assets/img/banner1.webp') }}" alt="">
        </div>

    </div>



    <x-PostNewComponent />
@endsection
