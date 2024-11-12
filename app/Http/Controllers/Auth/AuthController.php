<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '1',
        ]);

        Auth::login($user);

        return redirect()->route('client.home.index');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {

            return redirect()->route('client.home.index');
        } else {

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
                'password' => __('auth.failed'),
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('socialite_google_user');

        Auth::logout();

        return redirect()->route('client.home.index');
    }
}
