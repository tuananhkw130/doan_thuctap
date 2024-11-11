<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // Phương thức chuyển hướng đến Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Phương thức xử lý callback từ Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Tìm user đã tồn tại bằng email hoặc tạo mới
            $user = User::firstOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'password' => bcrypt('123456dummy') // Tạo mật khẩu giả cho user
                ]
            );

            // Đăng nhập user
            Auth::login($user);

            // Chuyển hướng sau khi đăng nhập thành công
            return redirect()->intended('/');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Có lỗi xảy ra khi đăng nhập bằng Google.');
        }
    }
}

