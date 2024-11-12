<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Log;

class GoogleController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

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

