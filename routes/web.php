<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ImageController;



Route::middleware(["auth"])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
    Route::post("posts/{post}", [CommentController::class, 'store'])->name('comment.store');

    Route::delete("logout", [LoginController::class, 'destroy'])->name('logout');
   
    Route::post("posts/{post}/replies", [ReplyController::class, 'store'])->name('reply.store');
    Route::post("image", [ImageController::class, 'store'])->name('image.store');
    Route::put("image/{image}", [ImageController::class, 'update'])->name('image.update');
    Route::delete("image/{image}", [ImageController::class, 'destroy'])->name('image.destroy');

});

Route::middleware(["guest"])->group(function () {
    Route::get("register", [RegisterController::class, 'create'])->name('register');
    Route::post("register", [RegisterController::class, 'store'])->name('register.store');

    Route::get("login", [LoginController::class, 'create'])->name('login');
    Route::post("login", [LoginController::class, 'store'])->name('login.store');
});
