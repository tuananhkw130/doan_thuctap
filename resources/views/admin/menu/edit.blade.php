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
            <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Thanh điều hướng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa điều hướng</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Chỉnh sửa menu</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.menu.update') }}">
                            @csrf
                            <input type="hidden" value="{{ $itemMenu->id }}" name="id">
                            <div class="form-group">
                                <label for="email">Tên menu</label>
                                <input type="text" class="form-control" value="{{ $itemMenu->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Route</label>
                                <input type="text" class="form-control" value="{{ $itemMenu->route }}" name="route">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Thứ tự</label>
                                <input type="text" class="form-control" value="{{ $itemMenu->order }}"name="order">
                            </div>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <a href="{{ route('admin.menu.index') }}" class="btn bg-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
