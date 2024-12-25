@extends('layouts.app')
@section('content')
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="alertModalLabel">Thông Báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: green">
                    @if (session('success'))
                        {{ session('success') }}
                    @elseif (session('error'))
                        <!-- Hiển thị thông báo lỗi -->
                        <span style="color: red;">{{ session('error') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container"style="padding-top: 150px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Đơn hàng của tôi</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('client.home.index') }}">Trang chủ</a>
                            <span>Đơn hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th style="text-align:center">Mã đơn hàng</th>
                                    <th style="text-align:center">Ngày đặt</th>
                                    <th style="text-align:center">Trạng thái đơn hàng</th>
                                    <th style="text-align:center">Hình thức thanh toán</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderList as $product)
                                    <tr>
                                        <td class="product__cart__item" style="text-align:center">
                                            <a class="text-a" href="{{ route('order.detail', ['id' => $product->id]) }}">
                                                Đơn hàng {{ $product->id }}
                                            </a>
                                        </td>
                                        <td class="product__cart__item" style="text-align:center; unicode-bidi: plaintext;">
                                            {{ $product->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="product__cart__item" style="text-align:center">
                                            {!! $product->statusOrder() !!}
                                        </td>
                                        <td class="product__cart__item" style="text-align:center">

                                            @if ($product->paymentstatus == 1)
                                                <span style="color: rgb(73, 99, 245);">Thanh toán khi nhận hàng</span>
                                            @elseif ($product->paymentstatus == 2)
                                                <span style="color: green;">Đã thanh toán qua ngân hàng</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                $('#alertModal').modal('show');
                setTimeout(function() {
                    $('#alertModal').modal('hide');
                }, 4000);
            @endif
        });
    </script>
@endsection
