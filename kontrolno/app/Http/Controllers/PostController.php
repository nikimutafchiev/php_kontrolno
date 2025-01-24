<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class PostController extends Controller
{
    //
    public function index()
    {
        return view("post.index", ["posts" => Post::all()]);
    }
    public function store(Request $request)
    {
        $request->user()->posts()->create($request->all());
        return redirect("/posts");
    }
    public function likeCount(Post $post)
    {
        return count(Like::where("post_id", $post->id)->get());
    }
}
