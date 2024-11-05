<section class="product spad pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">
                        <h2 style="font-weight:700">Sản phẩm mới</h2>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row product__filter" id="MixItUpE2CA1C">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ $product->image }}">
                            <span class="label">Mới</span>
                            <ul class="product__hover">
                                <li><a href="{{ route('product.detail', ['id' => $product->id]) }}"><img
                                            src="client/assets/img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $product->name }}</h6>
                            <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="add-cart">Thêm
                                vào giỏ hàng</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>{{ number_format($product->price) }} VND </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
