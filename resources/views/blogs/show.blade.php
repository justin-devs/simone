@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="/blogs" class="btn btn-primary"><< Back</a>
        </div>
        <br>
        <div class="row">
            <h2>{{$post->title}}</h2>
            <hr>
            <div class="jumbotron">
                <hr>
                    <p>{!! $post->body!!}</p>
                <hr>
                <h4>
                    @foreach($post->tags as $tag)
                        <span class="badge badge-pill badge-dark">{{$tag->name}}</span>
                    @endforeach
                </h4>
            </div>
        </div>
        @auth
            <a href="/blogs/{{$post->id}}/edit" class="btn btn-info">Edit Post</a>
            {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE','class' => 'float-right'])}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {{Form::close()}}
        @endauth
    </div>
@endsection
