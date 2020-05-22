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
    $post->user()->associate(Auth::user()); 
    $post->save();

    return redirect()->to('/'); 
}
public function index()
{
    $posts = Post::with(['user'])->orderBy('created_at', 'desc')->get();

    return view('index', ['posts' => $posts]);
}

    public function destroy(Post $post)
{
    $post->delete();

    return redirect()->to('/');
}

    public function delete(Post $post)
{
    abort(403);

    $post->delete();

    return redirect()->to('/');
}
public function delete(Post $post)
{
    
    if (Auth::id() !== $post->user_id) {
        abort(403);
    }

    $post->delete();

    return redirect()->to('/');
}
public function show(Post $post)
{
    return view('posts.show', ['post' => $post]);
}

}
