@extends('layouts.admin')
@section('content')
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
                        <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" id="validationDefault01" name="name" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Hình ảnh</label>
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile"></label>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Giá</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="price" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Số lượng</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="quantity" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Size</label>
                                    <select class="form-control mb-3" name="size">
                                        <option value="S" checked>S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL" >XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Mô tả</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="describe" >
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
@endsection
