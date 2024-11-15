@extends('layouts.app')
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
                            <a href="{{ route('checkout.index') }}">Thanh toán</a>
                            <span>Đặt hàng</span>
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
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th style="text-align:center">Mã đơn hàng</th>
                                    <th style="text-align:center">Ngày đặt</th>
                                    <th style="text-align:center">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderList as $product)
                                    <tr>
                                        <td class="product__cart__item" style="text-align:center">
                                            {{ $product->id }}
                                        </td>
                                        <td class="product__cart__item" style="text-align:center; unicode-bidi: plaintext;">
                                            {{ $product->created_at }}
                                        </td>
                                        <td class="product__cart__item" style="text-align:center">
                                            {!! $product->statusOrder() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
