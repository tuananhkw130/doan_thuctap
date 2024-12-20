@extends('layouts.app')
@php
    $total = 0;
@endphp
@section('content')
    @if ($season == 'winter')
        <script src="{{ asset('client/assets/js/snow.js') }}"></script>
    @elseif ($season == 'autumn')
        <script src="{{ asset('client/assets/js/leaves.js') }}"></script>
    @endif

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option" style="padding-top: 180px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Thanh Toán</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('client.home.index') }}">Trang chủ</a>
                            <a href="{{ route('cart.index') }}">Giỏ hàng</a>
                            <span>Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{ route('checkout.orderVnpay') }}" method="POST">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-6">
                            <h6 class="checkout__title">Thông tin người nhận</h6>
                            <div class="row">
                            </div>
                            <div class="checkout__input">
                                <p>Họ và tên<span>*</span></p>
                                <input type="text" name="fullname">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="address" class="checkout__input__add">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Điện thoại<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Lời nhắn</p>
                                <input type="text" name="message">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                                @foreach ($cart as $product)
                                    <ul class="checkout__total__products">
                                        <li>{{ $product->name }}
                                            x{{ $product->quantity }}<span>{{ number_format($product->price) }} VND</span>
                                        </li>
                                    </ul>
                                @endforeach
                                @php
                                    $total += $product->quantity * $product->price;
                                @endphp
                                <ul class="checkout__total__all">
                                    <li>Tổng <span>{{ number_format($total) }} VND</span></li>
                                </ul>
                                <button type="submit" name="action" value="home" class="site-btn">
                                    Thanh toán khi nhận hàng
                                </button>
                                <button type="submit" name="action" value="bank" class="site-btn mt-3">
                                    Thanh toán qua ngân hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
