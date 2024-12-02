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
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Chỉnh sửa thông tin sản phẩm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.product.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $itemProduct->id }}" name="id">
                            <div class="form-group">
                                <label for="email">Danh mục</label>
                                <select class="form-control mb-3" name="id_category">
                                    <option selected="">Chọn danh mục</option>
                                    @foreach ($listCategory as $itemCategory)
                                        <option value="{{ $itemCategory->id }}"
                                            {{ $itemProduct->id_category == $itemCategory->id ? 'selected' : '' }}>
                                            {{ $itemCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Tên sản phẩm</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="validationDefault01">Hình ảnh hiện tại</label>
                                <div class="d-flex flex-wrap mb-3">
                                    @if (is_array($itemProduct->image))
                                        @foreach ($itemProduct->image as $index => $image)
                                            <div class="position-relative mr-3">
                                                <img src="{{ $image }}" alt="Hình ảnh sản phẩm" height="100"
                                                    class="rounded mb-2">
                                                <input type="checkbox" name="deleteImages[]" value="{{ $index }}"
                                                    class="position-absolute" style="top: 0; right: 0;">
                                            </div>
                                        @endforeach
                                    @else
                                        <span>Không có hình ảnh</span>
                                    @endif

                                </div>
                                <small>Chọn hình ảnh muốn xóa bằng cách tích vào checkbox.</small>
                            </div>
                            <div class="form-group">
                                <label for="validationDefault01">Thêm hình ảnh mới</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="newImages[]"
                                        multiple>
                                    <label class="custom-file-label" for="customFile">Chọn ảnh mới</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pwd">Giá</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->price }}"name="price">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Số lượng</label>
                                <input type="text" class="form-control"
                                    value="{{ $itemProduct->quantity }}"name="quantity">
                            </div>
                            <div class="form-group">
                                <label for="validationDefault01">Size</label>
                                <select class="form-control mb-3" name="size">
                                    <option value="S" checked>S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mô tả</label>
                                <input type="text" class="form-control"
                                    value="{{ $itemProduct->describe }}"name="describe">
                            </div>

                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <a href="{{ route('admin.product.index') }}" class="btn bg-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
