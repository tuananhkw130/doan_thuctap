<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::get();

        return view('client.post.index', [
            'posts' => $posts
        ]);
    }

    public function detail ($id) {
        $post = Post::findOrFail($id);
        return view('client.post.detail', [
            'post' => $post,
        ]);
    }
}
