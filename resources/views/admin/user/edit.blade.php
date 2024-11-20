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
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Người dùng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa tài khoản</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Chỉnh sửa người dùng</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.user.update') }}">
                            @csrf
                            <input type="hidden" value="{{ $user->id }}" name="id">
                            <div class="form-group">
                                <label for="name">Họ tên</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Email</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mật khẩu</label>
                                <input type="text" class="form-control" value="" name="password">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="changePassword"
                                        id="change-password">
                                    <label class="custom-control-label" for="change-password">Thay đổi mật khẩu</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Vai trò</label>
                                <select class="form-control mb-3" value="{{ $user->role }}" name="role">
                                    @foreach (UserRole::toSelectArray() as $val => $str)
                                        <option value="{{ $val }}">{{ $str }}</option>
                                    @endforeach
                                </select>
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
