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
            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Bài viết</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa bài viết</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Chỉnh sửa bài viết</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.post.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $itemPost->id }}" name="id">
                            <div class="form-group">
                                <label for="email">Tiêu đề</label>
                                <input type="text" class="form-control" value="{{ $itemPost->title }}" name="title">
                            </div>
                            <div class="form-group">
                                <label for="validationDefault01">Hình ảnh</label>
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="changeImage"
                                        id="change-image">
                                    <label class="custom-control-label" for="change-image">Thay đổi hình ảnh</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Nội dung</label>
                                <textarea class="form-control" required name="content">{{ $itemPost->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Tác giả</label>
                                <input type="text" class="form-control" value="{{ $itemPost->author }}"name="author">
                            </div>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <a href="{{ route('admin.post.index') }}" class="btn bg-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
