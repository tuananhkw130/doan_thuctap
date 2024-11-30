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
            <li class="breadcrumb-item">>Sản phẩm</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="alertModalLabel">Thông Báo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="color:green">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Danh sách sản phẩm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary mb-3" href="{{ route('admin.product.create') }}">Thêm sản phẩm</a>
                        <table class="table">
                            <thead>
                                <tr class="table-info">
                                    <th class="text-center" scope="col">STT</th>
                                    <th class="text-center" scope="col">Danh mục</th>
                                    <th class="text-center" scope="col">Tên sản phẩm</th>
                                    <th class="text-center" scope="col">Hình ảnh</th>
                                    <th class="text-center" scope="col">Giá</th>
                                    <th class="text-center" scope="col">Số lượng</th>
                                    <th class="text-center" scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody style="background: #fbf0f1">
                                @foreach ($listProduct as $index => $itemProduct)
                                    <tr>
                                        <th class="text-center"> {{ $index + 1 }}</th>
                                        <td class="text-center">{{ $itemProduct->category_name }}</td>
                                        <td class="text-center">{{ $itemProduct->name }}</td>
                                        <td class="text-center">
                                            <img height="100" src="{{ $itemProduct->image }}" alt="">
                                        </td>
                                        <td class="text-center">{{ number_format($itemProduct->price) }} VND</td>
                                        <td class="text-center">{{ $itemProduct->quantity }}</td>
                                        <td class="text-center">
                                            <div class="d-flex" style="justify-content: center">
                                                <a href="{{ route('admin.product.edit', ['id' => $itemProduct->id]) }}"
                                                    class="btn btn-warning">Sửa</a>
                                                <a href="{{ route('admin.product.delete', ['id' => $itemProduct->id]) }}"
                                                    class="btn btn-danger mx-2">Xoá</a>
                                            </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('error') || session('success'))
                $('#alertModal').modal('show');
                setTimeout(function() {
                    $('#alertModal').modal('hide');
                }, 2500);
            @endif
        });
    </script>
@endsection
