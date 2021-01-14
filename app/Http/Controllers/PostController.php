<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        // return $slug;
        return view('post.show', compact('slug'));
    }
}
