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
                                <label for="id_category">Danh mục</label>
                                <select class="form-control mb-3" name="id_category" id="id_category">
                                    <option selected>Chọn danh mục</option>
                                    @foreach ($listCategory as $itemCategory)
                                        <option value="{{ $itemCategory->id }}"
                                            {{ $itemProduct->id_category == $itemCategory->id ? 'selected' : '' }}>
                                            {{ $itemCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $itemProduct->name }}" required>
                            </div>


                            <div class="form-group">
                                <label for="current_images">Hình ảnh hiện tại</label>
                                <div class="d-flex flex-wrap mb-3" id="current_images">
                                    @if (is_array($itemProduct->image) || is_string($itemProduct->image))
                                        @php
                                            $images = is_array($itemProduct->image)
                                                ? $itemProduct->image
                                                : json_decode($itemProduct->image, true);
                                        @endphp
                                        @if ($images)
                                            @foreach ($images as $index => $image)
                                                <div class="position-relative mr-3">
                                                    <img src="{{ asset($image) }}" alt="Hình ảnh sản phẩm" height="100"
                                                        class="rounded mb-2">
                                                    <div class="form-check position-absolute" style="top: 0; right: 0;">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="deleteImages[]" value="{{ $index }}"
                                                            id="deleteImage_{{ $index }}">
                                                        <label class="form-check-label"
                                                            for="deleteImage_{{ $index }}"></label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <span>Không có hình ảnh</span>
                                        @endif
                                    @else
                                        <span>Không có hình ảnh</span>
                                    @endif
                                </div>
                                <small class="text-muted">Chọn hình ảnh muốn xóa bằng cách tích vào checkbox.</small>
                            </div>

                            <div class="form-group">
                                <label for="newImages">Thêm hình ảnh mới</label>
                                <input type="file" class="form-control-file" id="newImages" name="newImages[]" multiple>
                                <div class="mt-3" id="previewImages" style="display: flex; gap: 10px; flex-wrap: wrap;">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ $itemProduct->price }}" required>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Số lượng</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    value="{{ $itemProduct->quantity }}" required>
                            </div>

                            <div class="form-group">
                                <label for="size">Size</label>
                                <select class="form-control mb-3" name="size" id="size">
                                    <option value="S" {{ $itemProduct->size == 'S' ? 'selected' : '' }}>S</option>
                                    <option value="M" {{ $itemProduct->size == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="L" {{ $itemProduct->size == 'L' ? 'selected' : '' }}>L</option>
                                    <option value="XL" {{ $itemProduct->size == 'XL' ? 'selected' : '' }}>XL</option>
                                    <option value="XXL" {{ $itemProduct->size == 'XXL' ? 'selected' : '' }}>XXL</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="describe">Mô tả</label>
                                <textarea class="form-control" id="describe" name="describe" rows="3" required>{{ $itemProduct->describe }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <a href="{{ route('admin.product.index') }}" class="btn btn-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('newImages').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('previewImages');

            // Duyệt qua các tệp mới được chọn
            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Tạo một thẻ <img> mới cho mỗi ảnh
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = "Ảnh mới";
                    img.style.height = '100px';
                    img.style.marginRight = '10px';
                    img.style.borderRadius = '5px';
                    img.style.objectFit = 'cover';
                    img.style.display = 'inline-block';

                    // Thêm ảnh vào container preview mà không xóa ảnh trước đó
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
