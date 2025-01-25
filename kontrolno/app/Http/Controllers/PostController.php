<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class PostController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->user()->posts()->create($request->all());
        return redirect("/posts");
    }
    public function likeCount(Post $post)
    {
        return count(Like::where("post_id", $post->id)->get());
    }
    public function index()
    {
        $posts = [];
        foreach (Post::all() as $post) {
            array_push(
                $posts,
                [
                    "id" => $post->id,
                    "content" => $post->content,
                    "likes" => PostController::likeCount($post)
                ]
            );
        }
        return view("post.index", ["posts" =>  $posts]);
    }
    public function delete()
    {
        $post = Post::where("id", $_GET["post_id"])->get()[0];
        $post->delete();
        return redirect("posts");
    }
}
