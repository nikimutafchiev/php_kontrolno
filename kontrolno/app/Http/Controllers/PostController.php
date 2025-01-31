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
    public function index(Request $request)
    {
        $posts = [];
        foreach (Post::all() as $post) {
            array_push(
                $posts,
                [
                    "id" => $post->id,
                    "content" => $post->content,
                    "likes" => PostController::likeCount($post),
                    "is_liked" =>
                    $request->user()->likes()->where("post_id", $post->id)->first() ? "Dislike" : "Like"
                ]
            );
        }
        return view("post.index", ["posts" =>  $posts]);
    }
    public function update(Request $request, Post $post)
    {
        if ($request->user()->id == $post->user_id)
            $post->update($request->all());
        return redirect("posts");
    }
    public function delete(Request $request)
    {
        $post = Post::where("id", $_GET["post_id"])->first();
        if ($request->user()->id == $post->user_id) {
            $post->delete();
        }
        return redirect("posts");
    }
}
