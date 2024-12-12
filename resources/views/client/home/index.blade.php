@extends('layouts.app')

@section('content')
    @if ($season == 'winter')
        <script src="{{ asset('client/assets/js/snow.js') }}"></script>
    @elseif ($season == 'autumn')
        <script src="{{ asset('client/assets/js/leaves.js') }}"></script>
    @endif

    <section class="hero">
        <div class="hero__slider owl-carousel owl-loaded owl-drag">
            <div class="owl-stage-outer" style="height: 635px;">
                <div class="owl-stage"
                    style="transform: translate3d(-2698px, 0px, 0px); transition: all 0s ease 0s; width: 8094px;">
                    <div class="owl-item active" style="width: 1349px;">
                        <div class="hero__items set-bg" data-setbg="{{ asset('client/assets/img/hero/hero5.jpg') }}"
                            style="background-image: url({{ asset('client/assets/img/hero/hero5.jpg') }});">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-7 col-md-8">
                                        <div class="hero__text">
                                            <h6>Bộ sưu tập mùa hè</h6>
                                            <h2>Năng lượng tươi mát 2024</h2>
                                            <p>Khám phá nguồn cảm hứng mới và đắm chìm trong sự đa dạng của phong cách với
                                                bộ sưu tập đồ áo nam mùa hè của chúng tôi.</p>
                                            <a href="#" class="primary-btn">Xem ngay <span
                                                    class="arrow_right"></span></a>
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
                    <div class="owl-item" style="width: 1349px;">
                        <div class="hero__items set-bg" data-setbg="{{ asset('client/assets/img/hero/hero6.jpg') }}"
                            style="background-image: url(&quot;{{ asset('client/assets/img/hero/hero6.jpg') }}&quot;);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-7 col-md-8">
                                        <div class="hero__text">
                                            <h6>Mùa đông</h6>
                                            <h2>Fall - Winter Collections 2030</h2>
                                            <p> A specialist label creating luxury essentials. Ethically
                                                crafted with an
                                                unwavering
                                                commitment to exceptional quality.</p>
                                            <a href="#" class="primary-btn"
                                                style="background-color: #ffff; color: #000">Xem ngay
                                                <span class="arrow_right"></span></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-dots disabled"></div>
        </div>
    </section>

    <x-ProductNewComponent />


    <div class="container pb-5">
        <div class="winter">
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
    <div class="container pb-5">
        <div class="summer">
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
