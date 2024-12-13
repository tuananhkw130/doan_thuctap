@extends('layouts.admin')
@section('content')
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb iq-bg-primary mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home.index') }}">
                    <i class="ri-home-4-line mr-1 float-left"></i>
                    Trang chủ
                </a>
            </li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="d-flex align-item-center">
            <div class="col">
                <div class="d-flex">
                    <div class="col-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Số sản phẩm</h5>
                                    <span class="badge badge-primary">Hôm nay</span>
                                </div>
                                <h3><span class="counter" style="visibility: visible;">{{ $totalProducts }}</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a href='{{ route('admin.product.index') }}' class="mb-0">Xem chi tiết</a>

                                </div>
                                <div class="iq-progress-bar bg-primary-light mt-2">
                                    <span class="bg-primary iq-progress progress-1" data-percent="100"
                                        style="transition: width 2s; width: 100%;">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Số đơn hàng</h5>
                                    <span class="badge badge-warning">Hôm nay</span>
                                </div>
                                <h3><span class="counter" style="visibility: visible;">{{ $totalOrders }}</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a style="color: #e7d63d" href="{{ route('admin.order.index') }}" class="mb-0">
                                        Xem chi tiết </a>
                                </div>
                                <div class="iq-progress-bar bg-warning-light mt-2">
                                    <span class="bg-warning iq-progress progress-1" data-percent="100"
                                        style="transition: width 2s; width: 100%;">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Số lượng người dùng</h5>
                                    <span class="badge badge-success">Hôm nay</span>
                                </div>
                                <h3><span class="counter" style="visibility: visible;">{{ $totalUser }}</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a style="color: #48ca8d" href="{{ route('admin.user.index') }}" class="mb-0">
                                        Xem chi tiết </a>
                                </div>
                                <div class="iq-progress-bar bg-success-light mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="100"
                                        style="transition: width 2s; width: 100%;">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="col-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Đơn hàng hoàn thành</h5>
                                    <span class="badge badge-info">Hôm nay</span>
                                </div>
                                <h3><span class="counter" style="visibility: visible;">{{ $completedOrders }}</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a style="color: #47a8e9" href="{{ route('admin.order.listorderdone') }}"
                                        class="mb-0">
                                        Xem chi tiết
                                    </a>
                                </div>
                                <div class="iq-progress-bar bg-info-light mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="100"
                                        style="transition: width 2s; width: 100%;">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Đơn hàng đang xử lý</h5>
                                    <span class="badge bg-orange">Hôm nay</span>
                                </div>
                                <h3><span class="counter" style="visibility: visible;">{{ $pendingOrders }}</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a style="color: #e79933" href="{{ route('admin.order.listorderprocessing') }}"
                                        class="mb-0">
                                        Xem chi tiết
                                    </a>
                                </div>
                                <div class="iq-progress-bar bg-orange mt-2">
                                    <span class="bg-orange iq-progress progress-1" data-percent="100"
                                        style="transition: width 2s; width: 100%;">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Đơn hàng đã hủy</h5>
                                    <span class="badge bg-danger">Hôm nay</span>
                                </div>
                                <h3><span class="counter" style="visibility: visible;">{{ $cancelOrders }}</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a style="color: red" href="{{ route('admin.order.listordercancel') }}"
                                        class="mb-0">Xem
                                        chi
                                        tiết </a>
                                </div>
                                <div class="iq-progress-bar bg-danger mt-2">
                                    <span class="bg-danger iq-progress progress-1" data-percent="100"
                                        style="transition: width 2s; width: 100%;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="col-8">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Tổng danh thu</h5>
                                    <span class="badge" style="background-color: #945133; color:#ffff">Hôm nay</span>
                                </div>
                                <h3>
                                    <span class="counter" style="visibility: visible;">
                                        {{ number_format($doanhthu) }}VND
                                    </span>
                                </h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a style="color: #da8d4f" href="{{ route('admin.doanhthu') }}" class="mb-0">
                                        Xem chi tiết
                                    </a>
                                </div>
                                <div class="iq-progress-bar mt-2" style="background-color: #945133; color:#ffff">
                                    <span class=" iq-progress progress-1" data-percent="100"
                                        style="transition: width 2s; width: 100%; background-color: #945133"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Số lượng bài viết</h5>
                                    <span class="badge bg-pink">Hôm nay</span>
                                </div>
                                <h3><span class="counter" style="visibility: visible;">{{ $totalPost }}</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a style="color: #e76ea0" href="{{ route('admin.post.index') }}" class="mb-0">Xem
                                        chi
                                        tiết </a>
                                </div>
                                <div class="iq-progress-bar bg-pink mt-2">
                                    <span class="bg-pink iq-progress progress-1" data-percent="100"
                                        style="transition: width 2s; width: 100%;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-3">
                <div class="card align-item-center">
                    <div class="card-body text-center align-item-center inln-date flet-datepickr">
                        <input type="text" id="inline-date"class="date-input basicFlatpickr d-none flatpickr-input"
                            readonly="readonly">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
