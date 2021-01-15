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
            'posts' => Post::latest()->paginate(5),
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

    public function create()
    {
        return view('post.create');
    }

    // public function store(Request $request)
    public function store()
    {
        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->body = $request->body;
        // $post->save();

        // Post::create([
        //     'title' => $request->title,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body,
        // ]);

        // validate the field
        $attr = request()->validate([
            'title' => 'required|min:3|max:20',
            'body' => 'required',
        ]);

        // $post = $request->all();
        // memasukkan semua request yg ada di form
        // Assign title to the slug
        $attr['slug'] = \Str::slug(request('title'));
        // create new post
        Post::create($attr);

        // return redirect()->to('post/create');
        return back();
    }
}
