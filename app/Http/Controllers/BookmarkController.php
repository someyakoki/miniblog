<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
     $post=Auth::usera()->bookmarkingPosts;
     return view('bookmarks.index',['posts => $posts']);
    }

    public function add(Post $post)
    {
       Auth::user()->bookmarkingPosts()->attach($post->id);
       return redirect()->back();
    }

    public function remove(Post $post)
    {
     Auth::user()->bookmarkingPosts()->detach($post->id);

     return redirect()->back();
    }
}
