<section class="product spad p-0 pt-5 pb-4">
    <div class="container">
        <div class="row product__filter " id="MixItUpWinter">
            @foreach ($products as $product)
                @php
                    $images = is_string($product->image) ? json_decode($product->image, true) : $product->image;

                    $imageUrl = is_array($images) ? $images[0] : $images;
                @endphp
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix winter-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ htmlspecialchars($imageUrl) }}">
                            <span class="label">Mùa đông</span>
                            <ul class="product__hover">
                                <li><a href="{{ route('product.detail', ['id' => $product->id]) }}"><img
                                            src="client/assets/img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-2" style="color: #fff">{{ $product->name }}</h6>
                            <div class="rating mb-2" style="color: #da920e">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5 style="color: #fff">{{ number_format($product->price) }} VND </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="seeall">
            <button>Xem tất cả</button>
        </div>
    </div>
</section>
