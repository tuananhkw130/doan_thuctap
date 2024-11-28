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
            <li class="breadcrumb-item">Liên hệ</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Danh sách liên hệ</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="table-info">
                                    <th class="text-center col-1">STT</th>
                                    <th class="text-center col-3">Tên người liên hệ</th>
                                    <th class="text-center col-2">Email</th>
                                    <th class="text-center col-6">Lời nhắn</th>
                                </tr>
                            </thead>
                            <tbody style="background: #fbf0f1">
                                @foreach ($listContact as $index => $itemContact)
                                    <tr>
                                        <th class="text-center"> {{ $index + 1 }}</th>
                                        <td class="text-center">{{ $itemContact->name }}</td>
                                        <td class="text-center">{{ $itemContact->email }}</td>
                                        <td class="text-center">
                                            {{ $itemContact->message }}
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
@endsection
