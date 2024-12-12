@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option" style="padding-top: 180px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Danh sách yêu thích</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('client.home.index') }}">Trang chủ</a>
                            <a href="{{ route('product.index') }}">Sản phẩm</a>
                            <span>Yêu thích</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Favorite Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="col-lg-8" style="text-align:center">Sản phẩm</th>
                                    <th class="col-lg-2" style="text-align:center">Giá</th>
                                    <th class="col-lg-2" style="text-align:center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($favoriteItems as $product)
                                    <tr>
                                        <td class="product__cart__item" style="text-align:center; align-item:center">
                                            <div class="product__cart__item__pic" style="max-width:10%">
                                                <img src="{{ $product->image }}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $product->name }}</h6>
                                                <h5>{{ number_format($product->price) }} VND</h5>
                                            </div>
                                        </td>
                                        <td class="cart__price" style="text-align:center">
                                            {{ number_format($product->price) }}
                                        </td>
                                        <td class="cart__close" style="text-align:center">
                                            <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('favorite.delete', ['productID' => $product->id]) }}">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <h4 class="text-center mb-4" style="color: red;">Chưa có sản phẩm nào trong danh sách
                                        yêu thích</h4>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('product.index') }}">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
