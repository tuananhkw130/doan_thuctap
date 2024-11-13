<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('client.contact.index');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Tạo mới liên hệ
        Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message
        ]);

        // Đặt thông báo vào session
        return redirect()->route('contact.index')->with('success', 'Gửi liên hệ thành công!');
    }

}
