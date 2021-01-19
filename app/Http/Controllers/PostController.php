<?php

namespace App\Http\Controllers;

use App\{Category, Post, Tag};
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except([
    //         'index', 'show'
    //     ]);
    // }

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
        return view('post.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    // public function store(Request $request)
    public function store(PostRequest $request)
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
        // $attr = $this->validateRequest();
        $attr = $request->all();

        // $post = $request->all();
        // memasukkan semua request yg ada di form
        // Assign title to the slug
        $attr['slug'] = \Str::slug(request('title'));
        $attr['category_id'] = request('category');
        // create new post
        $post = auth()->user()->posts()->create($attr);

        $post->tags()->attach(request('tags'));

        // flash message
        // session()->flash('error', 'The post can not be created');
        session()->flash('success', 'The post was created');
        return redirect('post');
        // return redirect()->to('post/create');
        // return back();
    }

    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        // $attr = $this->validateRequest();
        $this->authorize('update', $post);
        $attr = $request->all();
        $attr['category_id'] = request('category');
        $post->update($attr);
        $post->tags()->sync(request('tags'));
        session()->flash('success', 'The post was updated');
        return redirect('post');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        session()->flash('success', 'The post was destroyed');
    }

    // public function validateRequest()
    // {
    //     return request()->validate([
    //         'title' => 'required|min:3|max:20',
    //         'body' => 'required',
    //     ]);
    // }
}
