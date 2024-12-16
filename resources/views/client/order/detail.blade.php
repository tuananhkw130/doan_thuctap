@php
    use App\Enums\OrderStatus;
@endphp
@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Start -->
    <section class="breadcrumb-option" style="padding-top: 180px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Chi tiết đơn hàng</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('client.home.index') }}">Trang chủ</a>
                            <a href="{{ route('order.index') }}">Đơn hàng</a>
                            <span>Chi tiết</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <p class="col-6">
                    <b>Người nhận:</b> {{ $order->fullname }}
                </p>
                <p class="col-6">
                    <b>Số điện thoại:</b> {{ $order->phone }}
                </p>
            </div>
            <div class="row">
                <p class="col-6">
                    <b>Địa chỉ:</b> {{ $order->address }}
                </p>
                <p class="col-6">
                    <b>Thông báo:</b> {{ $order->message }}
                </p>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="col-lg-6" style="text-align:center">Sản phẩm</th>
                                    <th class="col-lg-2" style="text-align:center">Giá</th>
                                    <th class="col-lg-2" style="text-align:center">Số lượng</th>
                                    <th class="col-lg-2" style="text-align:center">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetail as $product)
                                    <tr>
                                        <td class="product__cart__item" style="text-align:center; align-item:center">
                                            @php
                                                $images = is_string($product->image)
                                                    ? json_decode($product->image, true)
                                                    : $product->image;
                                                $imageUrl = is_array($images) ? $images[0] : $images;
                                            @endphp
                                            <div class="product__cart__item__pic" style="max-width:10%">
                                                <img src="{{ $imageUrl }}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $product->name }}</h6>
                                            </div>
                                        </td>
                                        <td class="cart__price" style="text-align:center">
                                            {{ number_format($product->price) }} VNĐ
                                        </td>
                                        <td class="cart__price" style="text-align:center">
                                            {{ $product->quantity }}
                                        </td>
                                        <td class="cart__price" style="text-align:center">
                                            {{ number_format($product->price * $product->quantity) }} VND
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        @if ($order->status === OrderStatus::ORDER)
                            <p class="mb-3 d-flex align-items-center justify-content-end">
                                <a class="btn btn-danger" href="{{ route('order.cancel', ['id' => $order->id]) }}">Hủy
                                    đặt hàng</a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
