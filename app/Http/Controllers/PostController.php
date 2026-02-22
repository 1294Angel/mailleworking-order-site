<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public Function deletePost (Post $post) {
        if (auth() -> user() -> id == $post["user_id"]) {
            $post->delete();
        }

        return redirect('/ordering');
    }

    public Function showEditScreen(Post $post) {
        return view("edit-post", ["post" => $post]);
    }
    
    public function UpdatePost (Post $post, Request $request) {
        if (auth() -> user() -> id !== $post["user_id"]) {
            return redirect('/ordering');
        }

        $incomingFields = $request->validate([
            "title" => "required",
            "body" => "required"
        ]);

        foreach ($incomingFields as $key => $value) {
            $incomingFields[$key] = strip_tags($value);
        }

        $post->update($incomingFields);
        return redirect("/ordering");
    }
    public Function create_post(Request $request) {
        $incomingFields = $request->validate([
            "title" => "required",
            "body" => "required"
        ]);


        foreach ($incomingFields as $key => $value) {
            $incomingFields[$key] = strip_tags($value);
        };
        $incomingFields["user_id"] = auth()->id();
        Post::create($incomingFields);
        return redirect("/ordering");
    }
}