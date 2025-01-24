<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->user()->likes()->create(["post_id" => $_GET["post_id"]]);
        return redirect("/posts");
    }
}
