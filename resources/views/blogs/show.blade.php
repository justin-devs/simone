@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="/blogs" class="btn btn-primary"><< Back</a>
        </div>
        <br>
        <div class="row">
            <div class="jumbotron">
                <h2>{{$post->title}}</h2>
                <br>
                <p>{!! $post->body!!}</p>
            </div>
            </h1>
        </div>
        @auth
            <a href="/blogs/{{$post->id}}/edit" class="btn btn-info">Edit Post</a>
            {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE','class' => 'float-right'])}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {{Form::close()}}
        @endauth
    </div>
@endsection
