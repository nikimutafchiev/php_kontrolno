<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

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
        return redirect("/");
    }
}
