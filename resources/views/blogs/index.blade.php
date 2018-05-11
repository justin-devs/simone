@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{$title}} page</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        @foreach($genres as $blog)
                            @foreach($blog->posts as $post)
                                <div class="col-sm-6">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="/storage/cover_images/{{$post->cover_image}}" style="max-width: 400px; max-height: 200px;" alt="Card image cap">
                                            <div class="card-block">
                                                <h4 class="card-title">{{$post->title}}</h4>
                                                <hr>
                                                <p class="card-text">{!! limit_text($post->body, 10) !!}</p>
                                                <br>
                                                <a href="/blogs/{{$post->id}}" class="btn btn-primary">Read now!</a>
                                                <hr>
                                                <p><small>Posted: {{$post->created_at}}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                <br/>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-4">
                   <div class="row">
                       @foreach($genres as $blog)
                           @foreach($blog->posts as $post)
                               <div class="col-sm-6">
                                   <div class="card">
                                       <img class="card-img-top img-fluid" src="/storage/cover_images/{{$post->cover_image}}" style="max-width: 400px; max-height: 200px;" alt="Card image cap">
                                       <div class="card-block">
                                           <h6 class="card-title">{{$post->title}}</h6>
                                           <hr>
                                           <a href="/blogs/{{$post->id}}" class="btn btn-sm btn-info">Read now!</a>
                                       </div>
                                   </div>
                               </div>
                               <br/>
                           @endforeach
                       @endforeach
                   </div>
                </div>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 offset-5">
                {{$genres->links()}}
            </div>
        </div>
    </div>
@endsection
