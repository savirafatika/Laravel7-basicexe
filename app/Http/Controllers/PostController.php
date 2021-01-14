<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)->firstOrFail();

        // if (!$post) {
        //     abort(404);
        // }

        return view('post.show', compact('post'));
    }
}
