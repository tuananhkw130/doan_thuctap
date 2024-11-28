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
            <li class="breadcrumb-item">Bài viết</li>
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
                            <h4 class="card-title">Danh sách bài viết</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="table-info">
                                    <th class="text-center" scope="col">STT</th>
                                    <th class="text-center" scope="col">Tiêu đề</th>
                                    <th class="text-center" scope="col">Hình ảnh</th>
                                    <th class="text-center" scope="col">Tác giả</th>
                                    <th class="text-center" scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody style="background: #fbf0f1">
                                @foreach ($listPost as $index => $itemPost)
                                    <tr>
                                        <th class="text-center"> {{ $index + 1 }}</th>
                                        <td class="text-center">{{ $itemPost->title }}</td>
                                        <td class="text-center"><img height="100" src="{{ $itemPost->image }}"
                                                alt=""></td>
                                        <td class="text-center">{{ $itemPost->author }}</td>
                                        <td class="text-center">
                                            <div class="d-flex" style="justify-content: center">
                                                <a href="{{ route('admin.post.edit', ['id' => $itemPost->id]) }}"
                                                    class="btn btn-warning">Sửa</a>
                                                <a href="{{ route('admin.post.delete', ['id' => $itemPost->id]) }}"
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
