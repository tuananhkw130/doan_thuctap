@extends('layouts.app')
@php
    use Illuminate\Support\Str;
@endphp
@section('content')
    @if ($season == 'winter')
        <script src="{{ asset('client/assets/js/snow.js') }}"></script>
    @elseif ($season == 'autumn')
        <script src="{{ asset('client/assets/js/leaves.js') }}"></script>
    @endif
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container" style="padding-top: 150px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <div class="breadcrumb__links">
                            <a href="{{ route('client.home.index') }}" style="font-size: 18px;">Trang chủ</a>
                            <span style="font-size: 18px;">Danh sách sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad" style="padding: 40px 0 40px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Tìm kiếm">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Danh mục</a>
                                    </div>

                                    <x-CategoryComponent />

                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Lọc theo giá</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="{{ route('product.index', ['price' => '1']) }}">0 - 100.000
                                                            VND</a></li>
                                                    <li><a href="{{ route('product.index', ['price' => '2']) }}">100.000 -
                                                            200.000 VND</a></li>
                                                    <li><a href="{{ route('product.index', ['price' => '3']) }}">200.000 -
                                                            300.000 VND</a></li>
                                                    <li><a href="{{ route('product.index', ['price' => '4']) }}">300.000 -
                                                            500.000 VND</a></li>
                                                    <li><a href="{{ route('product.index', ['price' => '5']) }}">500.000 VND
                                                            +</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($products as $itemproduct)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $itemproduct->image }}">
                                        <ul class="product__hover">
                                            <li>
                                                <a href="{{ route('product.detail', ['id' => $itemproduct->id]) }}">
                                                    <img src="client/assets/img/icon/search.png" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>{{ $itemproduct->name }}</h6>
                                        <a href="{{ route('cart.add') }}" class="add-cart">Thêm vào giỏ hàng</a>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <h5 class="text-bold">{{ number_format($itemproduct->price) }} VND </h5>

                                        <form action="{{ route('favorite.add', ['productID' => $itemproduct->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="favorite-btn" title="Thêm vào yêu thích">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
