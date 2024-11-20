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
            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa danh mục</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Chỉnh sửa danh mục</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.category.update') }}">
                            @csrf
                            <input type="hidden" value="{{ $itemCategory->id }}" name="id">
                            <div class="form-group">
                                <label for="email">Tên danh mục</label>
                                <input type="text" class="form-control" value="{{ $itemCategory->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mô tả</label>
                                <input type="text" class="form-control" value="{{ $itemCategory->describe }}"
                                    name="describe">
                            </div>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <a href="{{ route('admin.category.index') }}" class="btn bg-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
