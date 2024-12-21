@php
    use App\Enums\UserRole;
@endphp

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('client/assets/img/vv.png') }}" />

    <title>Valor-Fashion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/owl.theme.default.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}" type="text/css">

    <!-- Thêm CSS cho Owl Carousel -->


    <!-- Thêm jQuery và Owl Carousel JS từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



</head>
@if ($season == 'winter')
    <script src="{{ asset('client/assets/js/snow.js') }}"></script>
@elseif ($season == 'autumn')
    <script src="{{ asset('client/assets/js/leaves.js') }}"></script>
@endif

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            @if (Auth::user())
                <div class="offcanvas__top__hover">
                    <span>Xin chào {{ Auth::user()->name }} <i class="arrow_carrot-down"></i></span>

                </div>
            @else
                <div class="offcanvas__top__hover">
                    <span>Tài khoản<i class="arrow_carrot-down"></i></span>
                    <ul>
                        <li><a href="#">Đăng ký</a></li>
                        <li><a href="#">Đăng nhập</a></li>
                    </ul>
                </div>
            @endif

        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ asset('client/assets/img/icon/search.png') }}"
                    alt=""></a>
            <a href="#"><img src="{{ asset('client/assets/img/icon/heart.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('client/assets/img/icon/cart.png') }}" alt="">
                <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <marquee>Miễn phí vận chuyển, đổi trả hàng trong vòng 30 ngày</marquee>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header fixed-top" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class ="header__top__left" style="width:300px">
                            <marquee style="color: rgb(253, 253, 253);">
                                Miễn phí vận chuyển, đổi trả hàng trong vòng 30 ngày - 195 Lê Duẩn, Thành phố Vinh - 147
                                Phan Bá Vành, Thành phố Thái Bình
                            </marquee>
                        </div>
                    </div>
                    @if (Auth::user())
                        <div class="col-lg-6 col-md-5">
                            <div class="header__top__right">
                                <div class="header__top__hover">
                                    <span>Xin chào {{ Auth::user()->name }} <i class="arrow_carrot-down"></i></span>
                                    <ul>
                                        @if (in_array(Auth::user()->role, [UserRole::ADMIN, UserRole::NhanVien]))
                                            <li class="control-account">
                                                <a href="{{ route('admin.home.index') }}">
                                                    Trang quản trị
                                                </a>
                                            </li>
                                        @else
                                            <li class="control-account">
                                                <a href="{{ route('order.index') }}">
                                                    Đơn hàng của bạn
                                                </a>
                                            </li>
                                        @endif
                                        <li class="control-account">
                                            <a href="{{ route('auth.logout') }}">
                                                Đăng xuất
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 col-md-5">
                            <div class="header__top__right">
                                <div class="header__top__hover">
                                    <span>Tài khoản <i class="arrow_carrot-down"></i></span>
                                    <ul>
                                        <li class="control-account">
                                            <a href="{{ route('auth.register') }}">
                                                Đăng ký
                                            </a>
                                        </li>
                                        <li class="control-account">
                                            <a href="{{ route('auth.login') }}">
                                                Đăng nhập
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo ">
                        <a href="{{ route('client.home.index') }}">
                            <img src="{{ asset('client/assets/img/3.png') }}" alt="" style="width:150px">
                        </a>
                    </div>
                </div>

                <x-MenuComponent />

                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch">
                            <img src="{{ asset('client/assets/img/icon/search.png') }}" alt="">
                        </a>
                        <a href="{{ route('favorite.index') }}">
                            <img src="{{ asset('client/assets/img/icon/heart.png') }}" alt="">

                        </a>
                        <a href="{{ route('cart.index') }}">
                            <img src="{{ asset('client/assets/img/icon/cart.png') }}" alt="">
                            <span>0</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('client/assets/img/4.png') }}" alt=""></a>
                        </div>
                        <p>Nơi bạn có thể khám phá và mua sắm những mẫu thời trang nam đẳng cấp, từ các bộ sưu tập mới
                            nhất cho đến những phong cách kinh điển.</p>
                        <a href="#"><img src="client/assets/img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Mua sắm</h6>
                        <ul>
                            <li><a href="#">Quần áo</a></li>
                            <li><a href="#">Giày dép</a></li>
                            <li><a href="#">Phụ kiện</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Dịch vụ</h6>
                        <ul>
                            <li><a href="#">Vận chuyển</a></li>
                            <li><a href="#">Chính sách đổi trả</a></li>
                            <li><a href="#">Phương thức thanh toán</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Liên hệ với chúng tôi</h6>
                        <div class="footer__newslatter">
                            <p>Để lại email của bạn để nhận được thông tin ưu đãi sớm nhất.</p>
                            <form action="{{ route('contact.index') }}">
                                <input type="text" placeholder="Email của bạn">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('client/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('client/assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/main.js') }}"></script>
</body>

</html>
