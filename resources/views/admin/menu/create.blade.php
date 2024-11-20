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
            <li class="breadcrumb-item active" aria-current="page">Thêm điều hướng</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm menu</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.menu.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Tên menu</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="name">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Route</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="route">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Thứ tự</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="order">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Thêm</button>
                                <a href="{{ route('admin.menu.index') }}" class="btn bg-danger">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
