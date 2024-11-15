<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $currentMonth = Carbon::now()->month;
        if (in_array($currentMonth, [11, 12, 1])) {
            $season = 'winter';
        } elseif (in_array($currentMonth, [8, 9, 10])) {
            $season = 'autumn';
        } else {
            $season = 'other';
        }

        $posts = Post::get();

        return view('client.post.index', [
            'posts' => $posts
        ], compact('season'));
    }

    public function detail($id)
    {
        $currentMonth = Carbon::now()->month;
        if (in_array($currentMonth, [11, 12, 1])) {
            $season = 'winter';
        } elseif (in_array($currentMonth, [8, 9, 10])) {
            $season = 'autumn';
        } else {
            $season = 'other';
        }

        $post = Post::findOrFail($id);
        return view('client.post.detail', [
            'post' => $post,
        ], compact('season'));
    }
}
