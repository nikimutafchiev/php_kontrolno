<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view("profile.index", ["bio" => "I'm 23 years old", "avatar" => "Pikachu"]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "bio" => 'required|min:10'
        ]);
        $request->user()->profile()->create($request->all());
        return redirect("/");
    }
}
