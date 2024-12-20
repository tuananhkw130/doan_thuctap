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
            <li class="breadcrumb-item">Đơn hàng</li>

        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Danh sách đơn hàng</h4>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('admin.order.index') }}" class="mb-4">
                        <div class="row px-3">
                            <div class="col-md-4">
                                <label for="specific_date">Chọn ngày cụ thể:</label>
                                <input type="date" id="specific_date" name="specific_date" class="form-control"
                                    value="{{ request('specific_date') }}">
                            </div>
                        </div>
                        <div class="row mt-3 px-3">
                            <div class="col-md-12 d-flex justify-content-start">
                                <button type="submit" class="btn btn-success">Lọc</button>
                                <a href="{{ route('admin.order.index') }}" class="btn btn-secondary ml-2">Reset</a>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="table-info">
                                    <th class="text-center" scope="col">STT</th>
                                    <th class="text-center" scope="col">Người đặt</th>
                                    <th class="text-center" scope="col">Ngày đặt</th>
                                    <th class="text-center" scope="col">Trạng thái</th>
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
