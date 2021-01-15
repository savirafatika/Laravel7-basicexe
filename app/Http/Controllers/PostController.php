<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // return Post::get(['title', 'slug']);
        // $posts = Post::simplePaginate(4);
        // $posts = Post::paginate(10);
        return view('post.index', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)->firstOrFail();

        // if (!$post) {
        //     abort(404);
        // }

        return view('post.show', compact('post'));
    }
}
