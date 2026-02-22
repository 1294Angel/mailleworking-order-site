<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/ordering', function() {
    if (auth()->check() && request("filter") == "mine") {
        $posts = auth()->user()->originalPosts()->get();
    } else {
        $posts = Post::with("user")->get();
    }
    return view("view-posts", ["posts" => $posts]);
});
Route::get("/create-post-page", function() {
    return view("create-post-page");
});

Route::get('/login', function() {
    return view('login-page');
});
Route::get('/register', function() {
    return view('register-page');
});
Route::get("/service-details", function() {
    return view("service-details");
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/login',[UserController::class, 'login']);


Route::post('/create-post', [PostController::class, 'create_post']);
Route::get('/edit-post/{post}',[PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}',[PostController::class, 'UpdatePost']);
Route::delete('/delete-post/{post}',[PostController::class, 'deletePost']);
