@extends('layouts.app')

@section('content')
    <h1 class="text-center">Blog page</h1>
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/250x100" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">{{$post->title}}</h4>
                            <p class="card-text">{!! limit_text($post->body, 28) !!}</p>
                            <a href="/blogs/{{$post->id}}" class="btn btn-primary">Read now!</a>
                        </div>
                    </div>
                </div>
                <br/>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 offset-3">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
