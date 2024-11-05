<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
        return view('client.contact.index');
    }

    public function store(Request $request) {

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact entry
        Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message
        ]);

        // Set success message in session
        session()->flash('success', 'Cảm ơn bạn đã gửi thông tin! Chúng tôi sẽ liên hệ với bạn sớm nhất.');

        return redirect()->route('contact.index'); // Redirect to the contact index
    }
}
