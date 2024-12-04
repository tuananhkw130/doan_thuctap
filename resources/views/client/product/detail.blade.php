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
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="false">
                                    <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-1.png"
                                        style="background-image: url(&quot;img/shop-details/thumb-1.png&quot;);">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">
                                    <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-2.png"
                                        style="background-image: url(&quot;img/shop-details/thumb-2.png&quot;);">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="true">
                                    <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-3.png"
                                        style="background-image: url(&quot;img/shop-details/thumb-3.png&quot;);">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-4.png"
                                        style="background-image: url(&quot;img/shop-details/thumb-4.png&quot;);">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/shop-details/product-big-2.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/shop-details/product-big-3.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane active" id="tabs-3" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/shop-details/product-big.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/shop-details/product-big-4.png" alt="">
                                    <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&amp;list=RD8PJ3_p7VqHw&amp;start_radio=1"
                                        class="video-popup"><i class="fa fa-play"></i></a>
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
