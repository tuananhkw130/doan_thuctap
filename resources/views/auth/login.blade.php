@extends('layouts.app')

@section('content')
    <div class="contact spad1" style=" background-color: #e6ede6;">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card" style="border-radius:15px">
                    <div class="card-header" style="border-radius:10px">
                        <h4 style=" font-weight: 700;text-align: center;">ĐĂNG NHẬP</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('auth.showLogin') }}">
                            @csrf
                            <div class="mb-3">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Vui lòng nhập lại email</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <input id="password" type="password" style="border-radius:5px"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Mật khẩu">

                                    <div class="input-group-append" style="z-index: 100">
                                        <i class="fas fa-eye-slash" id="togglePassword"></i>
                                    </div>
                                </div>

                                <!-- Lỗi xác thực nếu có -->
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Vui lòng nhập lại mật khẩu</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">

                                <button type="submit" class="btn btn-primary btn-sm btn-block" style="border-radius:25px">
                                    {{ __('Đăng nhập') }}
                                </button>

                            </div>

                            <div class="text-auth">
                                <p>Đăng nhập bằng cách khác</p>
                            </div>

                            <a class="btn text-white btn-sm btn-block" data-mdb-ripple-init
                                style="background-color: #dd4b39;border-radius:25px;" href="{{ route('auth.google') }}"
                                role="button">
                                <i class="fab fa-google pr-1"></i> Google
                            </a>
                            <a class="btn text-white btn-sm btn-block" data-mdb-ripple-init
                                style="background-color: #3b5998;border-radius:25px;" href="{{ route('auth.facebook') }}"
                                role="button">
                                <i class="fab fa-facebook-f pr-1"></i> Facebook
                            </a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
