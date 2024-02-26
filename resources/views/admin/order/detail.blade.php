@extends('layouts.admin')
@php
    use App\Enums\OrderStatus;
@endphp
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Đơn hàng {{ $order->id }}</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="py-3 d-flex">
                            <div class="">
                                <p class="mb-3">
                                    <b>Người nhận:</b> {{ $order->fullname }}
                                </p>
                                <p class="mb-3">
                                    <b>Số điện thoại:</b> {{ $order->phone }}
                                </p>
                                <p class="mb-3">
                                    <b>Địa chỉ:</b> {{ $order->address }}
                                </p>
                            </div>
                            <div class="">
                                <p class="mb-3">
                                    <b>Tổng số tiền:</b> {{ number_format($order->total) }} VND
                                </p>
                                <p class="mb-3">
                                    <b>Ghi chú:</b> {{ $order->note }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            @switch($order->status)
                                @case(OrderStatus::ORDER)
                                    <a href="{{ route('admin.order.cancel', ['id' => $order->id]) }}" class="btn btn-danger mx-1">Hủy</a>
                                    <a href="{{ route('admin.order.accept', ['id' => $order->id]) }}" class="btn btn-success mx-1">Chấp nhận</a>
                                    @break
                                @default

                            @endswitch
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
