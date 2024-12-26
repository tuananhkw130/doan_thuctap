@extends('layouts.admin')
@php
    use App\Enums\UserRole;
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
            <li class="breadcrumb-item">Sản phẩm</li>
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
                        @if (Auth::user()->role !== UserRole::NhanVien)
                            <a class="btn btn-primary mb-3" href="{{ route('admin.product.create') }}">Thêm sản phẩm</a>
                        @endif

                        <div class="row ">
                            <div class="col-7">
                                <form method="GET" action="{{ route('admin.product.index') }}" class="mb-4">
                                    <label for="specific_date" class="form-label">Chọn ngày cụ thể:</label>
                                    <div class="row align-items-center">
                                        <div class="col-md-4 pr-0">
                                            <input type="date" id="specific_date" name="specific_date"
                                                class="form-control" value="{{ request('specific_date') }}">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="d-flex justify-content-start gap-2">
                                                <button type="submit" class="btn btn-success mr-4">Lọc theo ngày</button>
                                                <div class="mr-2">
                                                    <button type="button" class="btn btn-info dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        Danh mục sản phẩm
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @foreach ($categories as $category)
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.product.byCategory', $category->id) }}">
                                                                {{ $category->name }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <a href="{{ route('admin.product.index') }}"
                                                    class="btn btn-secondary">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>

                        <table class="table">
                            <thead>
                                <tr class="table-info">
                                    <th class="text-center" scope="col">STT</th>
                                    <th class="text-center" scope="col">Danh mục</th>
                                    <th class="text-center" scope="col">Tên sản phẩm</th>
                                    <th class="text-center" scope="col">Hình ảnh</th>
                                    <th class="text-center" scope="col">Giá</th>
                                    <th class="text-center" scope="col">Số lượng</th>
                                    @if (Auth::user()->role !== UserRole::NhanVien)
                                        <th class="text-center" scope="col">Chức năng</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody style="background: #fbf0f1">
                                @foreach ($listProduct as $index => $itemProduct)
                                    <tr>
                                        <th class="text-center">{{ $index + 1 }}</th>
                                        <td class="text-center">{{ $itemProduct->category_name }}</td>
                                        <td class="text-center">{{ $itemProduct->name }}</td>
                                        <td class="text-center" style="width:300px">
                                            @php
                                                $images = is_string($itemProduct->image)
                                                    ? json_decode($itemProduct->image, true)
                                                    : $itemProduct->image;
                                                $imageUrl = is_array($images) ? $images[0] : $images;
                                            @endphp
                                            <img style="width:30%" src="{{ $imageUrl }}" alt="">
                                        </td>
                                        <td class="text-center">{{ number_format($itemProduct->price) }} VND</td>
                                        <td class="text-center">{{ $itemProduct->quantity }}</td>
                                        @if (Auth::user()->role !== UserRole::NhanVien)
                                            <td class="text-center">
                                                <div class="d-flex" style="justify-content: center">
                                                    <a href="{{ route('admin.product.edit', ['id' => $itemProduct->id]) }}"
                                                        class="btn btn-warning">Sửa</a>
                                                    <a href="{{ route('admin.product.delete', ['id' => $itemProduct->id]) }}"
                                                        class="btn btn-danger mx-2">Xoá</a>
                                                </div>
                                            </td>
                                        @endif
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
