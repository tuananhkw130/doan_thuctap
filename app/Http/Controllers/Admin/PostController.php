<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view("admin.post.index", [
            "listPost" => $posts
        ]);
    }

    public function create()
    {
        return view("admin.post.create");
    }

    public function store(Request $request)
    {
        $imgPath = $this->uploadFile($request->file('image'), 'post');
        Post::create([
            "title" => $request->title,
            "image" => $imgPath,
            "content" =>$request->content,
            "author" =>$request->author
        ]);
        return redirect()->route('admin.post.index');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view("admin.post.edit",[
            "itemPost" => $post
        ]);
    }

    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->title = $request->title;
        if ($request->changeImage) {
            $imgPath = $this->uploadFile($request->file('image'), 'post');
            $post->image = $imgPath;
        }
        $post->content = $request->content;
        $post->author = $request->author;

        $post->save();

        return redirect()->route('admin.post.index');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
