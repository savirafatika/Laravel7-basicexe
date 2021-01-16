@extends('layouts.app', ['title' => ' New Post'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">New Post</div>
                <div class="card-body">
                    <form action="/post/store" method="POST">
                        @csrf
                        @include('post.partials.form-control', ['submit' => 'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
