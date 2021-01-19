@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            @isset ($category)
            <h4>Category: {{ $category->name }}</h4>
            @endisset

            @isset ($tag)
            <h4>Tag: {{ $tag->name }}</h4>
            @endisset

            @if (!isset($tag) && !isset($category))
            <h4>All Posts</h4>
            @endif
            <hr>
        </div>
        <div>
            @if (Auth::check())
            <a href="{{ route('post.create') }}" class="btn btn-primary">New Post</a>
            @endif
        </div>
    </div>
    <div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <div class="card mb-4">

                @if ($post->thumbnail)
                <img style="height: 270px; object-fit: cover; object-position: center;" class="card-img-top"
                    src="{{ $post->takeImage }}">
                @endif

                <div class="card-body">
                    <div class="card-title">
                        {{ $post->title }}
                    </div>

                    <div>
                        {{ Str::limit($post->body, 100, '..') }}
                    </div>

                    <a href="/post/{{ $post->slug }}">Read More</a>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{-- format("d F, Y") --}}
                    Published on {{ $post->created_at->diffForHumans() }}
                    @can('update', $post)
                    <a href="post/{{ $post->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
                    @endcan
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-6">
            <div class="alert alert-info">
                There's no posts.
            </div>
        </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@stop
