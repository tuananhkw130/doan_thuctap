@extends('layouts.admin')
@php
    use App\Enums\UserRole;
@endphp
@section('content')
    <div class="container-fluid">

        <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="alertModalLabel">Thông Báo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="color: {{ session('success') ? 'green' : 'red' }}">
                            {{ session('error') ?? session('success') }}
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
                            <h4 class="card-title">Danh sách người dùng</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="datatable_wrapper" class="dataTables_wrapper">
                                <a class="btn btn-primary mb-3" href="{{ route('admin.user.create') }}">Thêm người dùng</a>
                                <table id="datatable" class="table data-table table-striped dataTable" role="grid"
                                    aria-describedby="datatable_info">
                                    <thead>
                                        <tr class="ligth" role="row">
                                            <th>Id</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Vai trò</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listUser as $user)
                                            <tr role="row" class="odd">
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role === UserRole::ADMIN ? 'Admin' : 'Người dùng' }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"
                                                            class="btn btn-warning">Sửa</a>
                                                        <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}"
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
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('error') || session('success'))
                $('#alertModal').modal('show');
                setTimeout(function() {
                    $('#alertModal').modal('hide');
                }, 3000);
            @endif
        });
    </script>
@endsection
