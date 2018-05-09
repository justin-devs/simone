@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Home page</h1>
        <hr>
        <div class="row">
            <div class="card card-inverse" >
                <div class="card-block">
                    <h3 class="card-title"><strong>{{$post[0]['title']}}</strong><small class="text-muted"> created at: {{$post[0]['created_at']}}</small></h3>
                    <hr>
                    <p class="card-text">    {{$post[0]['body']}}</p>
                    <a href="/blogs/{{$post[0]['id']}}" class="btn btn-primary">Show post</a>
                </div>
            </div>
        </div>
    </div>
@endsection
