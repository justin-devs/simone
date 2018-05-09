@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection
@section('content')
    <div class="container">
        <h2>Create Post</h2>
        {!! Form::open(['action' => 'PostsController@store']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title...'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['id' => 'ck','class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            <div class="form-group">
                {{Form::label('tags', 'Tags')}}
                <select name="tags" class="form-control select2-multi" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{ucwords($tag->name)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('Category', 'Category')}}
                <select name="genre_id" class="form-control">
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}">{{ucwords($genre->type)}}</option>
                    @endforeach
                </select>
            </div>
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ck' );
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script>
        $('.select2-multi').select2();
    </script>
@endsection
