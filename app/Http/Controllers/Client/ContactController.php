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

        Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "message" =>$request->message
        ]);
        return view('client.contact.index');
    }
}
