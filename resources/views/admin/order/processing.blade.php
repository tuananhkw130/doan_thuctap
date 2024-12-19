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
            <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Đơn hàng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đơn hàng đang xử lý</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Danh sách đơn hàng đang xử lý</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="table-info">
                                    <th class="text-center" scope="col">STT</th>
                                    <th class="text-center" scope="col">Người đặt</th>
                                    <th class="text-center" scope="col">Ngày đặt</th>
                                    <th class="text-center" scope="col">Trạng thái</th>
                                    <th class="text-center" scope="col">Hình thức</th>
                                    <th class="text-center" scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody style="background: #fbf0f1">
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <th class="text-center"> {{ $index + 1 }}</th>
                                        <td class="text-center">{{ $order->name }}</td>
                                        <td class="text-center">{{ $order->created_at->format('d/m/Y') }}</td>
                                        <td class="text-center">{!! $order->statusOrder() !!}</td>
                                        <td class="text-center">
                                            @if ($order->paymentstatus == 1)
                                                <span style="color: rgb(73, 99, 245);">Thanh toán khi nhận hàng</span>
                                            @elseif ($order->paymentstatus == 2)
                                                <span style="color: green;">Đã thanh toán qua ngân hàng</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.order.detail', ['id' => $order->id]) }}"
                                                class="btn btn-primary ">
                                                Xem chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
