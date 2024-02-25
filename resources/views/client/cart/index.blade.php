@extends('layouts.app')
@php
    $total = 0;
@endphp
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Giỏ hàng</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('client.home.index') }}">Trang chủ</a>
                            <a href="{{ route('product.index') }}">Sản phẩm</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cartItems as $product)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic" style="max-width:15%">
                                                <img src="{{ $product->image }}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $product->name }}</h6>
                                                <h5>{{ number_format($product->price) }} VND</h5>
                                            </div>
                                        </td>
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf

                                            <td class="quantity__item">
                                                <div class="quantity">
                                                    <div class="pro-qty-2">
                                                        <input type="text" value="{{ $product->quantity }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price">
                                                {{ number_format($product->price * $product->quantity) }}
                                            </td>
                                            <td class="cart__close"><a
                                                    href="{{ route('cart.delete', ['productID' => $product->id]) }}"><i
                                                        class="fa fa-close"></i></td>
                                            </tr>
                                        </form>
                                    @php
                                        $total += $product->price * $product->quantity;
                                    @endphp
                                @empty
                                    <h4 class="text-center mb-4" style="color: red;">Chưa có sản phẩm nào</h4>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('product.index') }}">Tiếp tục mua hàng</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Tổng đơn hàng</h6>
                        <ul>
                            <li>Tổng<span>{{ number_format($total) }} VND</span></li>
                        </ul>
                        <a href="{{ route('checkout.index') }}" class="primary-btn">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
