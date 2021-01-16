@extends('layouts.app', ['title' => ' Update Post'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Post: {{ $post->title }}</div>
                <div class="card-body">
                    <form action="/post/{{ $post->slug }}/edit" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') ?? $post->title }}"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="body">Body</label>
                            <textarea name="body" id="body"
                                class="form-control @error('body') is-invalid @enderror">{{ old('body') ?? $post->body }}</textarea>
                            @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
