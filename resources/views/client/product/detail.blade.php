@extends('layouts.app')
@section('content')
    <section class="shop-details">
        @if ($season == 'winter')
            <script src="{{ asset('client/assets/js/snow.js') }}"></script>
        @elseif ($season == 'autumn')
            <script src="{{ asset('client/assets/js/leaves.js') }}"></script>
        @endif

        <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="alertModalLabel">Thông Báo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color: red">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="product__details__pic">
            <div class="container" style="padding-top: 140px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb" style="text-align: left;">
                            <a href="{{ route('client.home.index') }}">Trang chủ</a>
                            <a href="{{ route('product.index') }}">Sản phẩm</a>
                            <span>Chi tiết sản phẩm</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content" style="display: flex; justify-content: center;">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel" style="width: 65%;">
                                <div class="product__details__pic__item">
                                    @php
                                        // Check if $product->image is an array and select the first image
                                        $imageUrl = is_array($product->image) ? $product->image[0] : $product->image;
                                    @endphp
                                    <img src="{{ htmlspecialchars($imageUrl) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content" style="margin-bottom: 60px;">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <div class="product__details__text">
                                <h4>{{ $product->name }}</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span> - 5 Reviews</span>
                                </div>
                                <h3> {{ number_format($product->price) }} VND</h3>
                                <p>{{ $product->describe }}</p>
                                <div class="product__details__option">
                                    <div class="product__details__option__size">
                                        <span>Size:</span>
                                        <label for="xxl">xxl
                                            <input name="size" type="radio" id="xxl">
                                        </label>
                                        <label class="active" for="xl">xl
                                            <input name="size" type="radio" id="xl">
                                        </label>
                                        <label for="l">l
                                            <input name="size" type="radio" id="l">
                                        </label>
                                        <label for="sm">s
                                            <input name="size" type="radio" id="sm">
                                        </label>
                                    </div>
                                </div>
                                <div class="product__details__cart__option">
                                    <input type="hidden" name="productID" value="{{ $product->id }}">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <!-- Nút tăng -->
                                            <span class="fa fa-angle-up dec qtybtn"></span>
                                            <!-- Ô nhập số lượng -->
                                            <input type="text" name="quantity" value="1">
                                            <!-- Nút giảm -->
                                            <span class="fa fa-angle-down inc qtybtn"></span>
                                        </div>
                                    </div>

                                    <button type="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('error'))
                $('#alertModal').modal('show');
                setTimeout(function() {
                    $('#alertModal').modal('hide');
                }, 3000);
            @endif
        });
    </script>
@endsection
