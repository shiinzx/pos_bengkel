<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class PostController extends Controller
{
    // Menampilkan semua postingan
    public function index()
    {
        $posts = Post::latest()->get();
        return view('home', compact('posts'));
    }

    // Menyimpan posting baru
    public function store(Request $request)
    {
        $request->validate(['content' => 'required|max:300']);
        Post::create(['content' => $request->content]);
        return redirect()->back();
    }

    // Menambah like
    public function like(Post $post)
    {
        $post->increment('likes');
        return redirect()->back();
    }

    // Menyimpan komentar
    public function comment(Request $request, Post $post)
    {
        $request->validate(['content' => 'required|max:200']);
        Comment::create([
            'post_id' => $post->id,
            'content' => $request->content,
        ]);
        return redirect()->back();
    }
}
