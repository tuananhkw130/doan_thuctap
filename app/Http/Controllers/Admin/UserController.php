<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', [
            'listUser' => $users
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect()->route('admin.user.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->role = $request->role;
        if ($request->changePassword) {
            $user->password = $request->password;
        }
        $user->save();
        return redirect()->route('admin.user.index');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if ($user->role == 0) {

            return redirect()->route('admin.user.index')->with('error', 'Không thể xóa người quản trị.');
        }
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'Xóa người dùng thành công.');
    }

}
