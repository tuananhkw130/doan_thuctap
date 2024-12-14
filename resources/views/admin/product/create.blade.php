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
            <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm sản phẩm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Danh mục</label>
                                    <select class="form-control mb-3" name="id_category">
                                        <option selected="">Chọn danh mục</option>
                                        @foreach ($listCategory as $itemCategory)
                                            <option value="{{ $itemCategory->id }}">
                                                {{ $itemCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="name">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Hình ảnh</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="images[]"
                                            multiple>
                                        <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                    </div>
                                    <div id="preview" class="mt-3 row"></div>
                                    <!-- Khu vực hiển thị ảnh -->
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Giá</label>
                                    <input type="text" class="form-control" id="priceInput" name="price">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Số lượng</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="quantity">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Size</label>
                                    <select class="form-control mb-3" name="size">
                                        <option value="Tất cả" checked>Tất cả size</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Mô tả</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="describe">
                                </div>

                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary mx-2" type="submit">Thêm</button>
                                <a href="{{ route('admin.product.index') }}" class="btn bg-danger">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const previewContainer = document.getElementById('preview'); // Khu vực preview
        const customFileInput = document.getElementById('customFile');

        customFileInput.addEventListener('change', function(event) {
            const files = event.target.files; // Lấy danh sách file mới

            if (files.length === 0) {
                const noImage = document.createElement('p');
                noImage.textContent = 'Không có ảnh nào được chọn.';
                previewContainer.appendChild(noImage);
                return;
            }

            // Thêm từng file vào khu vực preview
            Array.from(files).forEach((file) => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    // Khi file được đọc xong
                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.classList.add('col-md-3', 'mb-3');

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-thumbnail');
                        img.style.width = '30%';

                        col.appendChild(img);
                        previewContainer.appendChild(col);
                    };

                    reader.readAsDataURL(file); // Đọc file dưới dạng URL
                } else {
                    const warning = document.createElement('p');
                    warning.textContent = `File "${file.name}" không phải là ảnh.`;
                    warning.style.color = 'red';
                    previewContainer.appendChild(warning);
                }
            });
        });
    </script>
@endsection
