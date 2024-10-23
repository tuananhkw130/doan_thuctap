<section class="latest spad" style="padding-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Tin tức mới nhất</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="pic">
                            <div class="blog__item__pic set-bg">
                                <img src="{{ $post->image }}" alt="{{ $post->title }}">
                            </div>
                        </div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('client/assets/img/icon/calendar.png') }}" alt=""
                                    type="date">{{ $post->created_at }}</span>
                            <h5>{{ $post->title }}</h5>
                            <a href="{{ route('post.detail', ['id' => $post->id]) }}">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
