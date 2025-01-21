<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::get('/', [PostController::class, "index"]);
Route::post("/post", [PostController::class, "store"]);
Route::get('/profile', [ProfileController::class, "index"]);
Route::post("/profile", [ProfileController::class, "store"]);
