<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts', [PostController::class, "index"])->name("posts.index");
    Route::post("/post", [PostController::class, "store"])->name("posts.store");
    Route::delete("/post/", [PostController::class, "delete"])->name("posts.delete");
    Route::post("/like/", [LikeController::class, "store"])->name("like.store");
});



require __DIR__ . '/auth.php';
