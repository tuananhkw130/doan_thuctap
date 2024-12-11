@extends('layouts.admin')
@php
    use App\Enums\OrderStatus;
@endphp
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
            <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="">
                            @switch($order->status)
                                @case(OrderStatus::ORDER)
                                    <a href="{{ route('admin.order.cancel', ['id' => $order->id]) }}"
                                        class="btn btn-danger mx-1">Hủy</a>
                                    <a href="{{ route('admin.order.accept', ['id' => $order->id]) }}"
                                        class="btn btn-success mx-1">Chấp nhận</a>
                                @break

                                @case(OrderStatus::CANCEL_ORDER)
                                    <h4 class="bg-secondary-light pl-3 pr-3 py-2  rounded">
                                        Đơn hàng đã hủy
                                    </h4>
                                @break

                                @case(OrderStatus::DELIVERY)
                                    <h4 class="bg-success-light pl-3 pr-3 py-2  rounded">
                                        Đơn hàng thành công
                                    </h4>
                                @break

                                @default
                                    <span class="text-muted">Trạng thái không xác định</span>
                            @endswitch
                        </div>
                        @if ($order->status == OrderStatus::DELIVERY)
                            <a href="{{ route('admin.order.export_pdf', ['id' => $order->id]) }}" class="btn btn-info"
                                id="btnExportPDF">
                                Xuất hóa đơn PDF
                            </a>
                        @endif
                    </div>

                    <div class="card-body ">
                        <div class="py-3 row">
                            <div class="col-4">
                                <p class="">
                                    <b>Người nhận:</b> {{ $order->fullname }}
                                </p>
                                <p class="">
                                    <b>Số điện thoại:</b> {{ $order->phone }}
                                </p>


                            </div>
                            <div class="col-4">
                                <p class="">
                                    <b>Địa chỉ:</b> {{ $order->address }}
                                </p>

                                <p class="">
                                    <b>Ghi chú:</b> {{ $order->note }}
                                </p>
                            </div>
                        </div>
                        <div class="">
                            <table class="table">
                                <thead>
                                    <tr class="table-info">
                                        <th class="text-center" scope="col">#</th>
                                        <th class="text-center" scope="col">Tên sản phẩm</th>
                                        <th class="text-center" scope="col">Hình ảnh</th>
                                        <th class="text-center" scope="col">Số lượng</th>
                                        <th class="text-center" scope="col">Giá</th>
                                        <th class="text-center" scope="col">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody style="background: #fbf0f1">
                                    @foreach ($orderDetail as $product)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $product->id }}</th>
                                            <td class="text-center">{{ $product->name }}</td>

                                            <td class="text-center">
                                                @php
                                                    $images = is_array($product->image)
                                                        ? $product->image
                                                        : json_decode($product->image, true);
                                                @endphp

                                                @forelse ((array) $images as $image)
                                                    <img src="{{ $image }}" alt="Ảnh sản phẩm" height="100"
                                                        class="mr-2">
                                                @empty
                                                    <img src="{{ is_string($product->image) ? $product->image : '' }}"
                                                        alt="Ảnh sản phẩm" height="100">
                                                @endforelse
                                            </td>

                                            <td class="text-center">{{ $product->quantity }}</td>
                                            <td class="text-center">
                                                {{ number_format($product->price) }} VND
                                            </td>
                                            <td class="text-center">
                                                {{ number_format($product->price * $product->quantity) }} VND
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>
                                <b>Tổng số tiền:</b> {{ number_format($order->total) }} VND
                            </p>
                            <div class="">
                                @if ($order->status == OrderStatus::CANCEL_ORDER)
                                    <a href="{{ route('admin.order.listordercancel') }}" class="btn bg-danger">Quay lại</a>
                                @elseif ($order->status == OrderStatus::DELIVERY)
                                    <a href="{{ route('admin.order.listorderdone') }}" class="btn bg-danger">Quay lại </a>
                                @elseif ($order->status == OrderStatus::ORDER)
                                    <a href="{{ route('admin.order.listorderprocessing') }}" class="btn bg-danger">
                                        Quay lại
                                    </a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn bg-danger">Quay lại</a>
                                @endif
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('btnExportPDF').addEventListener('click', function(e) {
            e.preventDefault(); // Ngăn không cho link mở trên trang hiện tại

            // URL để tải PDF
            const url = this.href;

            // Mở cửa sổ mới và tải PDF
            window.open(url, '_blank', 'width=800,height=600');
        });
    </script>
@endsection
