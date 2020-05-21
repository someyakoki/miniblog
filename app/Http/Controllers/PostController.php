<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user'])->get();

        return view('index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    $post = new Post;
    $post->fill($request->all());
    $post->user()->associate(Auth::user()); // ★
    $post->save();

    return redirect()->to('/'); // '/' へリダイレクト
}
}
