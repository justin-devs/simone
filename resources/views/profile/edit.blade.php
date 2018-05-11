@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection
@section('content')
    <div class="container">
        <h2>Edit Profile</h2>
        {{--{!! Form::open(['action' => ['ProfileController@edit', $profile->id], 'method' => 'PUT']) !!}--}}
            {{--<div class="form-inline">--}}
                {{--{{Form::label('name', 'Name')}}--}}
                {{--{{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}--}}
            {{--</div>--}}
            {{--<div class="form-inline">--}}
                {{--{{Form::label('surname', 'Surname')}}--}}
                {{--{{Form::text('surname', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}--}}
            {{--</div>--}}
            {{--<div class="form-control">--}}
                {{--{{Form::label('body', 'Body')}}--}}
                {{--{{Form::textarea('body', $post->body, ['id' => 'ck','class' => 'form-control', 'placeholder' => 'Body Text'])}}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--{{Form::label('tags', 'Tags')}}--}}
                {{--{{Form::select('tags[]', $tags, null, ['class' => 'select2-multi form-control', 'multiple' => 'multiple'])}}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--{{Form::label('Category', 'Category')}}--}}
                {{--<select name="genre_id" class="form-control">--}}
                    {{--@foreach($genres as $genre)--}}
                        {{--<option value="{{$genre->id}}">{{ucwords($genre->type)}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--{{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}--}}
        {{--{!! Form::close() !!}--}}
    </div>
@endsection

@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ck' );
    </script>

@endsection
