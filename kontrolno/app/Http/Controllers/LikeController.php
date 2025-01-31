<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use Ramsey\Uuid\Type\Integer;

class LikeController extends Controller
{
    //
    public function store(Request $request)
    {
        $liked = $request->user()->likes()->where("post_id", $_GET["post_id"])->first();
        if ($liked)
            LikeController::delete($liked);
        else
            $request->user()->likes()->create(["post_id" => $_GET["post_id"]]);
        return redirect("/posts");
    }
    public function delete(Like $like)
    {
        $like->delete();
        return redirect("posts");
    }
}
